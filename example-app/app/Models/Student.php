<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'address'
    ];

    public function academic()
    {
        return $this->hasOne(Academic::class);
    }
    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
