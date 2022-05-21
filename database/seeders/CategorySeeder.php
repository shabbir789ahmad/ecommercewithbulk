<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('categories')->insert([
          'category' => 'men',
          'category_image' => 'mffgffgfen',
           
        ]);
          DB::table('categories')->insert([
         'category' => 'Women',
           'category_image' => 'mffgffgfen'
        ]);
             DB::table('categories')->insert([
         'category' => 'Kids',
           'category_image' => 'mffgffgfen'
        ]);
    }
}
