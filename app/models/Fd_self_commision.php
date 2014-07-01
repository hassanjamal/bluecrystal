<?php
use LaravelBook\Ardent\Ardent;

class Fd_self_commision extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();
	protected $table ='fd_self_commision';
	public static $rules = array();

	/**
	 * [rank description]
	 * @return [type] [description]
	 */
	public function rank()
	{
		return $this->belongsTo('Rank' , 'id');
	}
}

