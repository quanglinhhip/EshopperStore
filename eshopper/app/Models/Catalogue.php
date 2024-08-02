<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cover',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean'
        //lay input dau vao -> auto convert true/fasle-> 0/1-> save vao db
        // lay ra ->auto convert 0/1->true/false
    ];
}