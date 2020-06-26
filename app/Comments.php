<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded = [];

    public static function getComments($id)
    {
        return Comments::where('post_id', $id)->orderBy('created_at')->get();
    }

    public static function getPostSlug($id)
    {
        return Posts::where('id', $id)->first();
    }

    public function posts()
    {
        return $this->hasMany(Posts::class );
    }

    public function User()
    {
        return $this->belongsTo(User::class );
    }
}
