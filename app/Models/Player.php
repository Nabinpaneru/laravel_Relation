<?php

namespace App\Models;
use App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded=[];
//     public function player(){
//     return $this->belongsTo(Club::class,'club_id','id');
//    }
}
