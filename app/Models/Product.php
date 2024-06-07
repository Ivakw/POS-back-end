<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'name',
        'price',
        'qty',
        'isActive'
    ];

    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $product = Product::latest()->first();

            if($product !== null){

                $str = explode('/',$product->code);

                $model->attributes['code'] = $str[0].'/'.intVal($str[1]) +1;
            }


        });
    }

}
