<?php
use LaravelBook\Ardent\Ardent;

class Rank extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();

	public static $rules = array();

	/**
	 * [fd_self_commision description]
	 * @return [type] [description]
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

	/**
	 * [mis_self_commision description]
	 * @return [type] [description]
	 */
	public function mis_self_commission()
	{
		return $this->hasOne('Mis_self_commission', 'rank_id');
	}

	/**
	 * [mis_team_commision description]
	 * @return [type] [description]
	 */
	public function mis_team_commission()
	{
		return $this->hasOne('Mis_team_commission', 'rank_id');
	}


}
