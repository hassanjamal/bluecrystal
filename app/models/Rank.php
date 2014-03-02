<?php
use LaravelBook\Ardent\Ardent;

class Rank extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();

	public static $rules = array();
	/**
	 * 
	 */
	public function fd_self_commision()
	{
		return $this->hasOne('Fd_self_commision', 'rank_id');
	}
	/**
	 * 
	 */
	public function fd_team_commision()
	{
		return $this->hasOne('Fd_team_commision', 'rank_id');
	}
	/**
	 * 
	 */
	public function rd_self_commision()
	{
		return $this->hasOne('Rd_self_commision', 'rank_id');
	}
	/**
	 * 
	 */
	public function rd_team_commision()
	{
		return $this->hasOne('Rd_team_commision', 'rank_id');
	}
}
