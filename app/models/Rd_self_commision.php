<?php

class Rd_self_commision extends Eloquent {
	protected $guarded = array();
	protected $table ='rd_self_commision';
	public static $rules = array();
	/**
	 * 
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}


