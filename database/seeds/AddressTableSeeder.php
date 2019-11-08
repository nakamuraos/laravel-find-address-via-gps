<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            "name" => "DEMO 123 Restaurent",
            "photos" => '["quananvat.jpg"]',
            "detail" =>  "126 Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '1',
            "verified" => true,
            "verified_by" => "1",
            "created_at" =>"2019-02-11 13:00:00",
            "verified_time" => "2019-03-11 11:00:00",
            "location" => "21.057046,105.7305",
        ]);
        DB::table('addresses')->insert([
            "name" => "DEMO 456 Restaurent",
            "photos" => '["quananvat.jpg"]',
            "detail" =>  "số 57, Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '3',
            "verified" => true,
            "verified_by" => "1",
            "created_at" =>"2019-02-11 13:00:00",
            "verified_time" => "2019-03-11 11:00:00",
            "location" => "21.055339,105.7855",
        ]);
        DB::table('addresses')->insert([
            "name" => "DEMO 789 Restaurent",
            "photos" => '["quananvat.jpg"]',
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '3',
            "verified" => true,
            "verified_by" => "1",
            "created_at" =>"2019-02-11 13:00:00",
            "verified_time" => "2019-03-11 11:00:00",
            "location" => "21.054037,105.73820",
        ]);
        DB::table('addresses')->insert([
            "name" => "DEMO 321 Restaurent",
            "photos" => '["quananvat.jpg"]',
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '2',
            "verified" => true,
            "verified_by" => "1",
            "created_at" =>"2019-02-11 13:00:00",
            "verified_time" => "2019-03-11 11:00:00",
            "location" => "21.054037,105.73820",
        ]);
    }
}
