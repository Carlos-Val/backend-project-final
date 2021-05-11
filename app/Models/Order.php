<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleComic',
        'imageComic',
        'price',
        'iduser'
    ];

    public function orderUser() {
        return $this -> belongsTo('App\Models\User', 'iduser', 'id');
    }

}
