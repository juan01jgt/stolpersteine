<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stolpersteine extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','localidad','f_nacimiento','f_defuncion','biografia','Descripcion','foto'];
}
