<?php

class Mis_scheme_payment extends \Eloquent {
	protected $fillable = [];
	protected $table = 'mis_scheme_payment';


	public function mis_scheme_return()
	{
		return $this->hasMany('Mis_scheme_return', 'mis_scheme_payment_id');
	}
}