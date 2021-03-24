<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    function pizzas(){
        return $this->belongsToMany(Pizza::class, 'commande_pizza', 'pizza_id', 'commande_id')
            ->withPivot('qte');
    }
}
