<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'car_model_id');
    }
}
