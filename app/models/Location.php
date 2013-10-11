<?php

class Location extends Eloquent {

  public function card() {
    $this->belongsTo('Card');
  }

  public static function getClosestLocations(array $pos, $start = 0, $batch = 20) {
    if (!self::validatePoint($pos) or !is_integer($start)) {
      throw new \Symfony\Component\Process\Exception\InvalidArgumentException(
      'Please provide a valid point, start and end parameters');
    }

    $end = $start + $batch;

    $query = "SELECT id, description, X(latlng) as x, Y(latlng) as y, "
      . "GLength(LineStringFromWKB(LineString("
      . "GeomFromText(AsText(latlng)), GeomFromText('POINT({$pos[0]} {$pos[1]})')))) "
      . "AS distance "
      . "FROM locations "
      . "WHERE card_id = 2 "
      . "ORDER BY distance ASC "
      . "LIMIT {$start}, {$end};";


//    return $query;
    $result = DB::select($query);
    return $result;
  }

  protected static function validatePoint($point) {
    $valid = array_reduce($point, function($total, $item) {
      return $total and is_numeric($item);
    }, TRUE);

    return $valid and count($point) >= 2;
  }

}
