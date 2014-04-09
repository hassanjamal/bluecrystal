<?php

class Fd_team_commision extends Eloquent {
	protected $guarded = array();
	protected $table ='fd_team_commision';
	public static $rules = array();
	/**
	 * 
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}

