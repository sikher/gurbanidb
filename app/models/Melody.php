<?php

class Melody extends Eloquent
{
	protected $table = 'melodies';

	public function scopeLine($query, $input)
	{
		return $query->where('id', '=', $input);
	}
}