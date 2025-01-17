<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        
    ];

    public function types(){
        return $this->belongsToMany(Type::class , "product_types");
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, "carts");
    }
}
