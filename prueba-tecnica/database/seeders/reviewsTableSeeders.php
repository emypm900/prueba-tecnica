<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reviewsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('reviews')->insert([
            'user_id' => 1,
            'book_id' => 2,
            'title' => 'Hola',
            'review_text' => 'prueba de review numero 1',
            'rating' => 5, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
        DB::table('reviews')->insert([
            'user_id' => 2,
            'book_id' => 1,
            'title' => 'Hola de nuevo',
            'review_text' => 'prueba de review numero 2',
            'rating' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
