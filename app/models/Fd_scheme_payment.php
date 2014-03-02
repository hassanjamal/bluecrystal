<?php

class Fd_scheme_payment extends Eloquent {
	protected $guarded = array();
	protected $table = 'fd_scheme_payment';
	public static $rules = array();

	public function policy()
	{
		return $this->belongsTo('Policy', 'id');
	}
}
