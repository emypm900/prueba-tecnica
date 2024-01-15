<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    public function book(){
        return $this->belongsTo('App\Models\book', 'book_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\user', 'user_id');
    }

}
