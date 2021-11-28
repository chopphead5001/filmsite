<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor_groups extends Model {

    use HasFactory;

    protected $fillable = [
        'actor',
        'film'
    ];
}
