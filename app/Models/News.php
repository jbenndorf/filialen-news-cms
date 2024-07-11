<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_url'];

    public function relatedFiliale()
    {
        return $this->belongsTo(Filiale::class);
    }
}
