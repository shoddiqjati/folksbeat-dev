<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    
  	protected $fillable = array('id','student_id', 'book_id', 'borrowed_at', 'expired_at', 'returned_at');

	public static $rules = array(

	  );

}
