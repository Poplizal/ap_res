<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dish extends Model
{
    use HasFactory;

    public function Categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}

