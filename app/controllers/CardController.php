<?php

class CardController extends BaseController {
    
    public function getAllCards()  {
        $cards = Card::all();
        return $cards->toJson();
    }
    
}