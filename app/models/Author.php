<?php

class Author extends Eloquent
{
	public function scopeLine($query, $author_id)
	{
		return $query->where('id', '=', $author_id);
	}
}