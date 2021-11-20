<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "orders";
	protected $fillable = [ 'id' , 'customer_id' , 'order' , 'meals' ];
	public $timestamps = false;

    public function customer (){
        return $this->belongsTo( Customer::class , foreignKey : 'customer_id' , localKey:'id' ); 
    }

    use HasFactory;
}
