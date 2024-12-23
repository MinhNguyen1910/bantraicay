<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','price','sale_price','content','category_id','status'];

    public function cat()  {
        return $this->hasOne(Category::class, 'id','category_id');
    }
}
