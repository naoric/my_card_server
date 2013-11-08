<?php

class CustomerController extends BaseController {

  public function postJoin() {

    $user = Auth::user();
    $card = Card::findOrFail(Input::get('cid'));
    $user->cards()->attach($card,[
        'biz_points' => $card->init_biz_points,
        'purchase_count' => 0,
        
    ]);
    
  }

}
