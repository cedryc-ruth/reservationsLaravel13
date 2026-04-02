<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('localities', timestamps:false, key: 'postal_code')]
class Locality extends Model
{
    protected $fillable = ['postal_code','locality'];

    //protected $primaryKey = 'postal_code';
}
