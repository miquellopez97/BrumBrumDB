<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bbusers extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'bbusers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username','email','name','surname','password','rol','detail','otherInformation','photo'
    ];
}
