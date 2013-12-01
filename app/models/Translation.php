<?php

class Translation extends Eloquent
{
	protected $table = 'translation';

	public function scripture()
	{
		return $this->belongsTo('Scripture');
	}

	public function language()
	{
		return $this->belongsTo('Language');
	}
}