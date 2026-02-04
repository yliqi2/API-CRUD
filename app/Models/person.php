<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'person_id';
    protected $keyType = 'int';
    public $incrementing = true;
    
    //campos que se pueden rellenar
    protected $fillable = ['first_name', 'last_name'];

    protected $hidden = [];

    public function getRouteKeyName(): string
    {
        return 'person_id';
    }

    public function animals()
    {
        return $this->hasMany(\App\Models\animals::class, 'person_id', 'person_id');
    }
}
