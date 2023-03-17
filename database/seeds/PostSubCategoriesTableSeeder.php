<?php

use Illuminate\Database\Seeder;

class PostSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_sub_categories')->insert([
            ['post_main_category_id' => '1',
            'sub_category' => '江戸城潜入調査'],
            ['post_main_category_id' => '2',
            'sub_category' => '馬当番']
        ]);
    }
}
