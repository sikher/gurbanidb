<?php

class Melody extends Eloquent
{
	protected $table = 'melodies';

	public function scopeLine($query, $melody_id)
	{
		return $query->where('id', '=', $melody_id);
	}
}