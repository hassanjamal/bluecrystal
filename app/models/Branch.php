<?php
use LaravelBook\Ardent\Ardent;

class Branch extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();

	public static $rules = array(
            'name' 		   => 'required|alpha_num',
			'address'      => 'required|alpha_dash' ,
			'city'         => 'required|alpha_dash' ,
			'state'        => 'alpha_dash' ,
			'pin'          => 'digits:6' ,
			'managername'  => 'alpha' ,
			'managerphone' => 'digits:10' ,
			'email'        => 'email' ,
			'phone'        => 'required|digits:10',
	);
	/**
	 * 
	 */
	public function associate()
	{
		return $this->hasMany('Associate', 'branch_id');
	}
	/**
	 * 
	 */
	public function user()
	{
		return $this->hasMany('User', 'branch_id');
	}
	/**
	 * 
	 */
	public  function policy()
	{
		return $this->hasMany('Policy', 'branch_id');
	}
}
