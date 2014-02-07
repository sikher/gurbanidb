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

	public function scopePage($query, $input)
	{
		return $query->with('melody','author','language')->where('page', '=', $input);
	}

	public function scopeHymn($query, $input)
	{
		return $query->with('melody','author','language')->where('hymn', '=', $input);
	}

	public function scopeLine($query, $input)
	{
		return $query->with('melody','author','language')->where('id', '=', $input);
	}
}