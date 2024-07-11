<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiale extends Model
{
    use HasFactory;

    protected $table = 'filialen';

    protected $fillable = ['name'];

    public function relatedNews()
    {
        return $this->hasMany(News::class);
    }
}
