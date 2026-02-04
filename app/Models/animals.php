<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    protected $table = 'animals';
    protected $primaryKey = 'animal_id';
    protected $keyType = 'int';
    public $incrementing = true;
    
    //campos que se pueden rellenar
    protected $fillable = ['name', 'species', 'weight', 'disease', 'comments'];

    protected $hidden = [];

    public function getRouteKeyName(): string
    {
        return 'animal_id';
    }
}
