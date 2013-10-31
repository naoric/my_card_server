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

}
