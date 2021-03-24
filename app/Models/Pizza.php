<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commande_pizza', 'commande_id', 'pizza_id')
            ->withPivot('qte');
    }
}
