<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model
{
    protected $table = 'post_sub_categories';

    protected $fillable = [
        'post_main_category_id',
        'sub_category',
    ];

    public function posts(){
        return $this->belongsToMany(
            'App\Models\Posts\Post','posts_post_sub_categories','sub_category_id','post_id'
        );
    }

    public function mainCategories(){
        return $this->belongsTo(
            'App\Models\Posts\PostMainCategory'
        );
    }
}
