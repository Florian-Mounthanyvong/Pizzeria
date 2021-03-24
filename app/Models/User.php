<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public $timestamps = false;
    protected $hidden = ['mdp'];
    protected $fillable = ['login', 'mdp', 'nom','prenom'];
    protected $attributes = [ 'type' => 'user'];

public function getAuthPassword()
{
return $this->mdp;
}
    public function isAdmin(){
        return $this->type == 'admin';
    }
    public function isCook(){
        return $this->type == 'cook';
    }
}
