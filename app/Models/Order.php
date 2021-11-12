<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function Dish(){
        return $this->belongsTo(Dish::class,'dish_id');
    }

    public function Table(){
        return $this->belongsTo(Table::class,'table_id');
    }
}
