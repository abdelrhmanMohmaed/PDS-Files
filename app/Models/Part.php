<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'model_id'];

    public function model()
    {
        return $this->belongsTo(ModelCar::class,'model_id','id');
    }
    public function pdsfiles()
    {
        return $this->belongsTo(Pdsfile::class);
    }
    public function workfiles()
    {
        return $this->belongsTo(Workfile::class);
    }
    public function packfiles()
    {
        return $this->belongsTo(Packfile::class);
    }
}
