<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    //campos que se pueden rellenar
    protected $fillable = ['name', 'species', 'weight', 'disease', 'comments'];

    protected $hidden = [];
}
