<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title', 'description', 'is_done','deadline','cost','percentage'
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
