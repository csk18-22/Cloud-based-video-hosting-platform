<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compression_resolutions extends Model
{
    use HasFactory;

     public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
