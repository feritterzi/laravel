<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supportcat extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function supports()
    {
        return $this->BelongsToMany('App\Models\Support');
    }
}
