<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = "customers";
	protected $fillable = [ 'id' , 'name' , 'email' , 'address' , 'phone' ];
	public $timestamps = false;

    public function get_orders(){
        return $this->hasMany( Order::class , foreignKey : 'customer_id' , localKey:'id' ); 
    }	

    use HasFactory;
}
