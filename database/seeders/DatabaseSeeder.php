<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_vendor')->insert([
          'nama' => 'PT AHASS INDONESIA',
        ]);

        DB::table('users')->insert([
          'name' => 'Dio',
          'email' => 'dio@gmail.com',
          'password' => bcrypt('123'),
          'role' => 'manager'
        ]);

        DB::table('users')->insert([
          'name' => 'Naufal',
          'email' => 'naufal@gmail.com',
          'password' => bcrypt('123'),
          'role' => 'admin'
        ]);

        DB::table('tbl_mobil')->insert([
          'nama' => 'ERTIGA',
          'img' => 'default.jpg',
          'kilometer' => 0
        ]);
    }
}
