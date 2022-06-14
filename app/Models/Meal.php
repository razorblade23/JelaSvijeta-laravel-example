<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use \Astrotomic\Translatable\Translatable;
    use HasFactory;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'discription'];

    public function category() {
        return $this->hasOne(Category::class);
    }
    public function tags() {
        return $this->hasMany(Tag::class);
    }
    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }
}
