<?php

class Card extends Eloquent {

  public $card_rules = [
    'lng' => 'required|numeric|between:-180,180',
    'lat' => 'required|numeric|between:-90,90'
  ];
  
  public function users() {
    return $this->belongsToMany('User');
  }

  public static function validatePoint(array $pos) {
    return Validator::make($pos, $card_rules);
  }

  public static function getNearby(array $pos, array $options = []) {
    $defaults = [
        'start' => 0,
        'batch' => 10,
    ];

    $options = array_merge($defaults, $options);
    $end = $options['start'] + $options['batch'];

    $query = 'SELECT *, GLENGTH(LINESTRING(' . self::getPointCode($pos) . ', latlng)) ' .
            'AS distance ' .
            'FROM cards ' .
            'ORDER BY distance ASC ' .
            'LIMIT ' . $options['start'] . ', ' . $end . ';';

    return DB::select($query);

  }

  private static function getPointCode(array $pnt) {
      return 'GEOMFROMTEXT(\'POINT(' . $pnt['lng'] . ' ' . $pnt['lat'] . ')\')';
  }

  public function scopeStartsWith($query, $prefix) {
    return $query->whereRaw('name like ?', [$prefix . '%']);
  }

  public function getLogoAttribute($value) {
    if ($value) {
      $info = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($info, $value);
      finfo_close($info);
      $contents = file_get_contents($value);
      $base64 = base64_encode($contents);
      return 'data:' . $mime . ';base64,' . $base64;
    }

    return $value;
  }

}
