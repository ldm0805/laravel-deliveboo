<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['name', 'slug','surname','phone','date', 'total', 'address', 'mail'];
    public static function generateSlug($name){
        return Str::slug($name, '-');
    }
    use HasFactory;
    public function plates(){
        return $this->belongsToMany(Plate::class);

    }
}
