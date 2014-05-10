<?php
use LaravelBook\Ardent\Ardent;

class Rd_scheme_payment extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();
	protected $table = 'rd_scheme_payment';
	public static $rules = array();

	public function policy()
	{
		return $this->belongsTo('Policy', 'id');
	}
}
