<?php

class Author extends Eloquent
{
	public function scopeLine($query, $input)
	{
		return $query->where('id', '=', $input);
	}
}