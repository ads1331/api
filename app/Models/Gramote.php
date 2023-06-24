<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gramote extends Model
{
    use HasFactory;

    protected $table = 'gramote';

    protected $fillable = [
        'name',
        'photo',
        'place',
        'url',
        'user_id'
    ];
}
