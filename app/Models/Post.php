<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Scopes\ActiveScope;

class Post extends Model
{
    use HasFactory;

    //add local scope Post::ActiveVips()->get()
    public function scopeActiveVips($query)
    {
        return $query->where('vip', true)->where('trial', false);
    }

    //add global scope
    protected static function boot()
    {
        раrent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', true);
        });
    }

    //or
    // static::addGlobalScope(new ActiveScope);
}
