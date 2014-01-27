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
}