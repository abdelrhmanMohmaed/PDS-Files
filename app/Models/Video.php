<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=['file','title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
