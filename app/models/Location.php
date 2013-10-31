<?php
use Naoric\Debugging\Debug;

class Location extends Eloquent {

  public function card() {
    $this->belongsTo('Card');
  }

  public static function getNearby(array $pos, array $options = []) {
    $defaults = [
        'start' => 0,
        'batch' => 10,
        'card' => null
    ];
    
    foreach ($defaults as $key => $value)  {
      $options[$key] = $options[$key] ?: $defaults[$key];
    }

    $options = array_merge($defaults, $options);
    $end = $options['start'] + $options['batch'];

    $where = $options['card'] ? 'WHERE card_id = ' . $options['card'] : '';

    $str_pos = 'POINT(' . $pos['lng'] . ' ' . $pos['lat'] . ')';
    $query = 'select cards.id, cards.name, locations.description, '
            . 'GLength(LineString(GeomFromText(\'' . $str_pos . '\'), latlng))'
            . ' AS distance '
            . 'FROM locations '
            . 'INNER JOIN cards ON cards.id = locations.card_id '
            . $where 
            . ' ORDER BY distance ASC '
            . ' LIMIT ' . $options['start'] . ', ' . $end;
    
    
    return DB::select($query);

  }

}
