<?php

class Policy extends Eloquent {
	protected $guarded = array();
	protected $table = 'policies';
	public static $rules = array(
	       	'branch_id' => 'required',
            'associate_no' => 'required',
            'scheme_type' => 'required',
            'scheme_name' => 'required',
            'name' => 'required',
            'age' => 'required',
            'guardian_type' => '',
            'guardian_name' => 'required',
            'pan_no' => '',
            'sex' => '',
            'date_of_birth' => '',
            'mobile' => '',
            'address' => '',
            'city' => '',
            'state' => '',
            'pincode' => '',
            'nominee_name' => '',
            'nominee_add' => '',
            'nominee_relation' => '',
            'nominee_age' => '',
	                             );

	/**
	 * 
	 */
	public function associate()
	{
		return $this->belongsTo('Associate','id');
	}
	/**
	 * 
	 */
	public function branch()
	{
		return $this->belongsTo('Branch','id');
	}
	/**
	 * one to one relation with FD Scheme Payment
	 */
	public function fd_scheme_payment()
	{
		return $this->hasOne('Fd_scheme_payment', 'policy_id');
	}

	/**
	 * one to many relation with RD Scheme Payment
	 */
	public function rd_scheme_payment()
	{
		return $this->hasMany('Rd_scheme_payment', 'policy_id');
	}
	/**
	 * 
	 */
	public function policy_self_commission()
	{
		return $this->hasOne('Policy_self_commission', 'policy_id');
	}
	/**
	 * 
	 */
	public function policy_team_commission()
	{
		return $this->hasMany('Policy_team_commission', 'policy_id');
	}
}
