<?php

class CardController extends BaseController {
    
    public function getAllCards()  {
        $cards = Card::all();
        $response = Response::json($cards->toArray())->setCallback(Input::get('callback'));
        return $response;
    }
    
}
