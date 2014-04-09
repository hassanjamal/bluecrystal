<?php
class Associate extends Eloquent {
	protected $guarded = array();
	protected $table = 'associates';
	public static $rules = array(
			'name'             => 'required',
			'age'              => 'required',
			'guardian_type'    => '',
			'guardian_name'    => 'required',
			'sex'              => 'required',
			'date_of_birth'    => 'required|date',
			'mobile'           => 'required',
			'address'          => 'required',
			'city'             => '',
			'state'            => '',
			'pincode'          => '',
			'bank_name'        => '',
			'bank_address'     => '',
			'account_no'       => '',
			'pan_no'           => '',
			'payment_mode'     => '',
			'associate_fees'   => '',
			'drawee_bank'      => '',
			'drawee_branch'    => '',
			'drawn_date'       => 'date',
			'cheque_no'        => '',
			'paid'             => '',
			'nominee_name'     => '',
			'nominee_add'      => '',
			'nominee_relation' => '',
			'nominee_age'      => '',
			'introducer_id'    => 'required',
			'rank_id'          => '',
			'start_date'       => 'date',
			'activate'         => '',
		);
	/**
	 * One Associate for One Branch.
	 */
	public function branch()
	{
		return $this->belongsTo('Branch' , 'id');
	}

  /**
   *  Many Policy From One Associate
   */
	public function policy ()
	{
		return $this->hasMany('Policy', 'id');
	}
}
