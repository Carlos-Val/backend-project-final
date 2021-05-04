<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickName', 
        'name',
        'surname1', 
        'surname2', 
        'email', 
        'password', 
        'token', 
        'dni', 
        'address', 
        'city', 
        'postalCode'
    ];

    public function userOrder() {

        return $this -> hasMany('App\Models\Order', 'iduser');
    }
    
}
