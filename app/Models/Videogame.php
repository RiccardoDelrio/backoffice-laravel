<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videogames';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'developer',
        'release_year',
        'image',
        'is_beta',
        'price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_beta' => 'boolean',
        'release_year' => 'integer',
    ];
}
