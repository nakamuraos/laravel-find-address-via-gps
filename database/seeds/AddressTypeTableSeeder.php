<?php

use Illuminate\Database\Seeder;

class AddressTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeaddresses')->insert([
            "name" => "Bệnh viện"
        ]);
        DB::table('typeaddresses')->insert([
            "name" => "Nhà hàng"
        ]);
        DB::table('typeaddresses')->insert([
            "name" => "Hiệu thuốc"
        ]);
        DB::table('typeaddresses')->insert([
            "name" => "Khách sạn"
        ]);
        DB::table('typeaddresses')->insert([
            "name" => "Quán ăn"
        ]);
        DB::table('typeaddresses')->insert([
            "name" => "Quán bar"
        ]);
    }
}
