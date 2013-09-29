<?php 

class Card extends Eloquent {

	public function image() {
		return $this->hasOne('Image');
	}

}