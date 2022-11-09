<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public function packfiles()
    {
        return $this->hasOne(Packfile::class);
    }
}
