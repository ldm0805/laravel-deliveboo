<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;



class Restaurateur extends Model
{
    use HasFactory;
    protected $fillable=['name', 'slug','image','p_iva','address','email', 'user_id'];
    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function plate(){
        return $this->belongsTo(Plate::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }

}
