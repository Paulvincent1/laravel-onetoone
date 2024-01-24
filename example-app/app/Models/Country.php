<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'continent',
        'name',
        'capital'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
