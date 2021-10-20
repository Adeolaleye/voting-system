<?php

namespace App;

use App\contestantcat;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    // protected $fillable = [
    //     'name', 'contestantcat_id', 'votecount',
    // ];

    protected $guarded = [];

    //one to many relationship
    //one to one relationship
    public function contestantcat(){
        return $this->belongsTo(contestantcat::Class);
    }
}
