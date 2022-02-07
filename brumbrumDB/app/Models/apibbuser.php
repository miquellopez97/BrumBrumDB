<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apibbuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'username','email','name','surname','password','rol','detail','otherInformation',
    ];
}
