<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    protected static function booted()
    {
        static::deleting(function ($movie) {
            if ($movie->movies()->exists()) {
                throw new \Exception('Related movies found');
            }
        });
    }
}
