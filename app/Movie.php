<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'year',
        'released',
        'runtime',
        'director',
        'imdb_votes'
    ];
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
}
