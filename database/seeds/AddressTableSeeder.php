<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "user_name" => "hien98",
            "full_name" => "Pham Thi Hien",
            "password" =>  bcrypt('123456'),
            "phone" => "093284755",
            "email" => "hienp9237@gmail.com",
            "verified" => true,
            "status" => true,
            "role_id" => "2",          
        ]);
    }
}
