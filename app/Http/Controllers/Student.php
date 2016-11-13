<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'nis';
    
  	protected $fillable = array('nis','name', 'is_active');

	public static $rules = array(

	  );

}
