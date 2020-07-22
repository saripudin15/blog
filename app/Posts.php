<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{

    use SoftDeletes;

    protected $fillable = ['judul', 'slug', 'category_id', 'content', 'gambar', 'users_id'];
   
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tags');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    // untuk refrensi relasi
    // public function users()
    // {
    //     return $this->belongsTo('App\User','nama_user','id');
    // }
}
