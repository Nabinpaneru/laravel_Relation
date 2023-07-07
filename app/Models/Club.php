<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Player;

class Club extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function relation(){
        return $this->hasMany(Player::class,'club_id','id');
    }
}
