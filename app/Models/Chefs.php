<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chefs extends Model
{
    protected $table = "chefs";
	protected $fillable = [ 'id' , 'name' , 'information' , 'photo' ];
	public $timestamps = false;


    use HasFactory;
}
