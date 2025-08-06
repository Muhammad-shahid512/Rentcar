<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehical extends Model
{
    protected $table="vehicals";

    use HasFactory;
    public function getfeature() {
    return $this->hasMany(CarFeatures::class, 'car_id');
} 
    public function getcategory() {
    return $this->belongsTo(Category::class, 'category_id');
} 
}
