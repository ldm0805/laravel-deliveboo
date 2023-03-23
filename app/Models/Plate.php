<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Plate extends Model
{
    use HasFactory;
    protected $fillable=['name', 'slug','image','ingredients','visible', 'price', 'availability', 'description', 'restaurateur_id','user_id'];
    public static function generateSlug($name){
        return Str::slug($name, '-');
    }
    public function restaurateurs(){
        return $this->hasMany(Restaurateur::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);

    }
}
