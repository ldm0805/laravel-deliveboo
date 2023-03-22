<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Restaurateur extends Model
{
    use HasFactory;
    protected $fillable=['name', 'slug','image','p_iva','address'];
    public static function generateSlug($name){
        return Str::slug($name, '-');
    }
}
