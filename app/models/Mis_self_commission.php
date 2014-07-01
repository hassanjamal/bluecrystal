<?php

class Mis_self_commission extends \Eloquent {
	protected $fillable = [];
	protected $table    = 'mis_self_commission';


	
	/**
	 * [rank description]
	 * @return [type] [description]
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}