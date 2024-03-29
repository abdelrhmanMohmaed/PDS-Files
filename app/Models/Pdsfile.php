<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdsfile extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'week', 'user_id', 'part_id', 'machine_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
