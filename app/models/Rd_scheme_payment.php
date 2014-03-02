<?php

class Rd_scheme_payment extends Eloquent {
	protected $guarded = array();
	protected $table = 'rd_scheme_payment';
	public static $rules = array();

	public function policy()
	{
		return $this->belongsTo('Policy', 'id');
	}
}
