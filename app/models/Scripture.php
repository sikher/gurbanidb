<?php

class Scripture extends Eloquent
{
	protected $table = 'scripture';

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