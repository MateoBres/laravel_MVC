<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idProduct';

    //METODOS DE RELACIONES (JOIN)

    //relacion a Brands
    public function  relBrand(){

        return $this->belongsTo(
                        '\App\Models\Brand',
                                'idBrand',
                                'idBrand'
                    );
    }

    //Relacion a Categories

    public function  relCategory(){

        return $this->belongsTo(
            Category::class,
            'idCategory',
            'idCategory'
        );
    }
}
