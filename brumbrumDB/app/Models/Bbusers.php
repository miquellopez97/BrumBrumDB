<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbusers extends Model
{
    use HasFactory;

    protected $table = 'bbusers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username','email','name','surname','password','rol','detail','otherInformation',
    ];
}
