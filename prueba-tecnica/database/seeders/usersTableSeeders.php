<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class usersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan',
            'surname' => 'perez',
            'email' => 'juanperez@gmail.com',
            'password' => Hash::make('123456'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ricardo',
            'surname' => 'Larrea',
            'email' => 'rikylarrea@gmail.com',
            'password' => Hash::make('123456'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
