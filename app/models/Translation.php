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

	public function scopeLine($query, $scripture, $language)
	{
		return $query->with('scripture.melody','scripture.author','scripture.language','language')->where('scripture_id', '=', $scripture)->where('language_id', '=', $language);
	}

	public function scopeOnly($query, $scripture, $language)
	{
		return $query->with('language')->where('scripture_id', '=', $scripture)->where('language_id', '=', $language);
	}

	public function scopeSearchWords($query, $search, $language, $offset)
	{
		return $query->with('scripture.melody','scripture.author','scripture.language','language')->where('language_id', '=', $language)->where('text', 'like', "%{$search}%")->skip($offset)->take(10);
	}
}