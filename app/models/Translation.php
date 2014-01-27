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
}