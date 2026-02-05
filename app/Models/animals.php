<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    protected $table = 'animals';
    protected $fillable = ['name', 'species', 'weight', 'disease', 'comments', 'person_id'];
}
