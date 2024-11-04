<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role_id'=>'1',
            'name'=>'Md.Admin',
            'username'=>'admin',
            'email'=>'admin@blog.com',
            'password'=>bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id'=>'2',
            'name'=>'Md.Author',
            'username'=>'author',
            'email'=>'author@blog.com',
            'password'=>bcrypt('rootauthor'),
        ]);
    }
}
