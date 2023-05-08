<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release',
    ];

    protected $attributes = [
        'title' => 'No Title',
        'release' => '1970-01-16',
    ];

    public function singers()
    {
        return $this->belongsToMany(Singer::class, 'singer_songs');
    }
}
