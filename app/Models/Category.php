<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    use HasFactory;

    //!UNA CATEGORIA TIENE MUCHOS PRODUCTOS
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
