<?php

class Card extends Eloquent
{

	public function users()
	{
		return $this->belongsToMany('Card');
	}

	public function locations()
	{
		return $this->hasMany('Location')
				->join('cards', 'cards.id', '=', 'locations.card_id')
				->select(array(
					'locations.*',
					'X(latlng) as x',
					'Y(latlng) as y',
					'description'
				));
	}

	public function scopeStartsWith($query, $prefix)
	{
		return $query->whereRaw('name like ?', [$prefix . '%']);
	}

	public function getLogoAttribute($value)
	{
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
