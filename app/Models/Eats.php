<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eats extends Model
{

    protected $table = "eats";
	protected $fillable = [ 'id' , 'title' , 'details' , 'photo' , 'type' , 'price' ];
	public $timestamps = false;

    use HasFactory;

}
