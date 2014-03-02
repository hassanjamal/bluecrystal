<?php
use LaravelBook\Ardent\Ardent;

class Fd_self_commision extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();
	protected $table ='fd_self_commision';
	public static $rules = array();
	/**
	 * 
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}

