<?php

class Policy_self_commission extends Eloquent {
	protected $guarded = array();
	protected $table = 'policy_self_commission';
	public static $rules = array();
	/**
	 * one to one relation with policy
	 */
	public function policy()
	{
		return $this->belongsTo('Policy', 'id');
	}
}
