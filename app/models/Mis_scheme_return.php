<?php

class Mis_scheme_return extends \Eloquent {
	protected $fillable = [];
	protected $table = 'mis_scheme_return';


	public function mis_scheme_payment()
	{
		return $this->belongsTo('Mis_scheme_payment', 'id');
	}
}