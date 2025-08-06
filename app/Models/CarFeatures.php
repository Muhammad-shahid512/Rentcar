<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeatures extends Model
{
    use HasFactory;
    protected $table="carsfeatures";
    protected $guarded;

      public function getfeaturename() {
    return $this->belongsTo(Feature::class, 'feature_id');
}   
}
