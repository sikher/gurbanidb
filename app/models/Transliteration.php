<?php

class Transliteration extends Eloquent
{
	protected $table = 'transliteration';

	public function scripture()
	{
		return $this->belongsTo('Scripture');
	}

	public function language()
	{
		return $this->belongsTo('Language');
	}
}