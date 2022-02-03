<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbusers extends Model
{
    use HasFactory;

    protected $fillable = [
        'Username','Email','Name','Surname','Password','Rol','Detail','OtherInformation',
    ];
}
