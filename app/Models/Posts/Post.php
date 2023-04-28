<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'post_sub_category_id',
        'delete_user_id',
        'update_user_id',
        'title',
        'post',
        'event_at',
    ];

    protected $casts = [
        'event_at' => 'datetime:YYYY年MM月DD日',
    ];

    public function user(){
        return $this->belongsTo('App\Models\Users\User');
    }

    public function subCategories(){
        return $this->belongsToMany(
            'App\Models\Posts\PostSubCategory','posts_post_sub_categories','post_id','sub_category_id'
        );
    }

    public function postComments(){
        return $this->hasMany('App\Model\Posts\PostComment');
    }
}
