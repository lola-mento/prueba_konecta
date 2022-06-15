<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','quantity'];

    //! UN PRODUCTO TIENE UNA CATEGORIA
    public function product()
    {
        return $this->hasOne(Product::class,'id');
    }

}
