<?php
use LaravelBook\Ardent\Ardent;

class Fdscheme extends \LaravelBook\Ardent\Ardent {
	protected $guarded = array();

	public static $rules = array(
	    'name' => 'required|alpha_num',
	    'years'=> 'required|numeric|between:1,7',
	    'interest' => 'required|numeric|between:1,100'
	);
}
