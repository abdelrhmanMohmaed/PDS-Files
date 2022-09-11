<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workfile extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'user_id', 'part_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
