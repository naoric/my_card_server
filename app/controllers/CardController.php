<?php

class CardController extends BaseController {

  public function getAllCards() {
    return Card::all()->toJson();
  }

  public function getSearch($name) {
    return Card::startsWith($name)->get()->toJson();
  }

  public function getGet($id) {
    return Card::find($id);
  }
  
  public function getNearby() {
    $pnt = Input::only(['lng', 'lat']);
    $options = Input::only(['card', 'batch', 'start']);

    $validator = Card::validatePoint($pnt);

    if ($validator->fails()) {
      return Response::json([
            'status' => 'failed',
            'messages' => $validator->messages()->toArray()
      ]);
    }

    return Response::json([
          'status' => 'success',
          'result' => Card::getNearby($pnt, $options)
    ]);
  }

}
