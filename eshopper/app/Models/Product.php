<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalogue_id',
        'name',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean'
        //lay input dau vao -> auto convert true/fasle-> 0/1-> save vao db
        // lay ra ->auto convert 0/1->true/false
    ];
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
}
