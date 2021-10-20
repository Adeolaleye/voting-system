<?php

namespace App;

use App\Contestant;
use Illuminate\Database\Eloquent\Model;

class contestantcat extends Model
{
    protected $guarded = [];
    
    public function contestants(){
        return $this->hasMany(Contestant::Class);
    }
}
