<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['name','link','image','description','position','status'];

    public function products()  {
        return $this->hasMany(Product::class, 'category_id','id');
    }

    public function scopeGetBanner ($q, $pos = 'top-banner') {
        $q = $q ->where('position',$pos)->orderBy('prioty','ASC');
        return $q;
    }
}