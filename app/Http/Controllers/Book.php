<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'barcode';
    
  	protected $fillable = array('barcode','title', 'id_category', 'can_be_borrowed');

	public static $rules = array(

	  );

}
