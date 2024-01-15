<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class booksTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Libro 1',
            'author' => 'Autor 1',
            'publication_year' => 2022,
            'user_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Libro 2',
            'author' => 'Autor 2',
            'publication_year' => 2020,
            'user_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
