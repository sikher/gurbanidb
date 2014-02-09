<?php

class Scripture extends Eloquent
{
	public function melody()
	{
		return $this->belongsTo('Melody');
	}

	public function author()
	{
		return $this->belongsTo('Author');
	}

	public function language()
	{
		return $this->belongsTo('Language');
	}

	public function scopePage($query, $page)
	{
		return $query->with('melody','author','language')->where('page', '=', $page);
	}

	public function scopeHymn($query, $hymn)
	{
		return $query->with('melody','author','language')->where('hymn', '=', $hymn);
	}

	public function scopeLine($query, $scripture_id)
	{
		return $query->with('melody','author','language')->where('id', '=', $scripture_id);
	}

	public function scopeSearchFirstLettersStart($query, $search, $offset)
	{
		return $query->with('melody','author','language')->where('search', 'like', "{$search}%")->skip($offset)->take(10);
	}

	public function scopeSearchFirstLettersAnywhere($query, $search, $offset)
	{
		return $query->with('melody','author','language')->where('search', 'like', "%{$search}%")->skip($offset)->take(10);
	}

	public function scopeSearchWords($query, $search, $offset)
	{
		return $query->with('melody','author','language')->where('scripture', 'like', "%{$search}%")->skip($offset)->take(10);
	}
}