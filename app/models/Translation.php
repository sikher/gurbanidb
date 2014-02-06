<?php

class Translation extends Eloquent
{
	public function scripture()
	{
		return $this->belongsTo('Scripture');
	}

	public function language()
	{
		return $this->belongsTo('Language');
	}

	public function scopeLine($query, $input, $input2)
	{
		return $query->with('scripture.melody','scripture.author','scripture.language','language')->where('scripture_id', '=', $input)->where('language_id', '=', $input2);
	}

	public function scopeOnly($query, $input, $input2)
	{
		return $query->with('language')->where('scripture_id', '=', $input)->where('language_id', '=', $input2);
	}
}