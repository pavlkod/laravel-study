<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// use App\Scopes\ActiveScope;
use App\Collections\OrderCollection;

class Post extends Model
{
    use HasFactory;

    // auto convert to timestamp (ex. created_at)
    protected $dates = [
        'met_at',
    ];


    // for acessor getFullNameAttribute toArray|toJson
    protected $appends = ['full_name'];

    // when update invoke methods
    protected $touches = ['contact'];

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


    // acsessor for $post->name (field name)
    public function getNameAttribute($value)
    {
        return $value ?: '(No name provided)';
    }

    //or acsessor for $post->full_name (field fullName doesn't exists)
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // mutator $post->amount = '15'
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value > 0 ? $value : 0;
    }

    // or proxy $post->workgroup_name = 'jstott';
    public function setWorkgroupNameAttribute($workgroupName)
    {
        $this->attributes['email'] = "{$workgroupName}@ourcompany.com";
    }
}
