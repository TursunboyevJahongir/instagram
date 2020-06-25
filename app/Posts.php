<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public static function getRecordWithSlug($slug)
    {
        return Posts::where('slug', '=', $slug)->first();
    }
}
