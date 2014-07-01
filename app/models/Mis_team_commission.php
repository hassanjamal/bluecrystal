<?php

class Mis_team_commission extends \Eloquent {
	protected $fillable = [];
	protected $table    = 'mis_team_commission';



	
	/**
	 * [rank description]
	 * @return [type] [description]
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}