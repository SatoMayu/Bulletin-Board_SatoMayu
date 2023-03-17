<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => '1',
            'post_sub_category_id' => '2',
            'title' => '掲示板運用開始のお知らせ',
            'post' => '本日からこちらの掲示板の利用を開始します。',
            'event_at' => '2205/03/17'
        ]);
    }
}
