<?php

class Language extends Eloquent
{
	public function scopeLine($query, $language_id)
	{
		return $query->where('id', '=', $language_id);
	}
}