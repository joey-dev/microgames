<?php

namespace MicroGames;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GamePages extends Model
{
    use Sluggable;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($game) {
            $game->{$game->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getKeyName()
    {
        return 'id';
    }

    public function gameObject()
    {
        return $this->hasOne('MicroGames\GameObject', 'game_pages_id');
    }

    public function requests()
    {
        return $this->hasOne('MicroGames\Requests');
    }

    public function reactions()
    {
        return $this->hasMany('MicroGames\Reactions', 'game_id');
    }

    public function tags()
    {
        return $this->belongsToMany('MicroGames\Tags');
    }
}
