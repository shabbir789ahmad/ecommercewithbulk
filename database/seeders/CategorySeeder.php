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
           
        ]);
          DB::table('categories')->insert([
         'category' => 'Women',
           
        ]);
             DB::table('categories')->insert([
         'category' => 'Kids',
           
        ]);
    }
}
