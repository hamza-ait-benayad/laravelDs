<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'downloads',
        'file_path',
        'user_id',
        'category_id'
    ];
}
