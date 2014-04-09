<?php

class Fdscheme extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
	    'name' => 'required|alpha_num',
	    'years'=> 'required|numeric|between:1,7',
	    'interest' => 'required|numeric|between:1,100'
	);
}
