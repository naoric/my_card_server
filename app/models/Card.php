<?php 

class Card extends Eloquent {

	public function locations() {
		return $this->hasMany('Location')
				->join('cards', 'cards.id', '=', 'locations.card_id')
				->select(array(
					'locations.*',
					'X(latlng) as x',
					'Y(latlng) as y',
					'description'
				));
	}

	public function scopeStartsWith($query, $prefix) {
		return $query->whereRaw('name like ?', [$prefix . '%']);
	}


}
