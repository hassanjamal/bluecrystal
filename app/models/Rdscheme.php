<?php

class Rdscheme extends Eloquent {
	protected $guarded = array();
//	protected $table = 'rdschemes';
	public static $rules = array(
	    'name' => 'required|alpha_num',
	    'years'=> 'required|numeric|between:1,7',
	    'interest' => 'required|numeric|between:1,100'
	);
}
