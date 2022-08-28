<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function compression_resolutions()
    {
        return $this->hasMany(compression_resolutions::class)->orderBy('created_at', 'DESC');
    }
}
