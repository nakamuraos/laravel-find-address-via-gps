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
            "name" => "Tiệm vịt quay Bắc Kinh",
            "photos" => '["/files/photos/quananvat.jpg"]',
            "detail" =>  "126 Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '1',
            "verified" => true,
            "verified_by" => "1",
            "verified_time" => "2019-01-01 00:00:00",
            "location" => "21.057046,105.730541",
        ]);
        DB::table('addresses')->insert([
            "name" => "Karaoke Chachacha 1",
            "photos" => '["/files/photos/quananvat.jpg"]',
            "detail" =>  "số 57, Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '2',
            "verified" => true,
            "verified_by" => "1",
            "verified_time" => "2019-01-01 00:00:00",
            "location" => "21.055339,105.730855",
        ]);
        DB::table('addresses')->insert([
            "name" => "Nhà hàng Đại Lâm Mộc",
            "photos" => '["/files/photos/quananvat.jpg"]',
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '2',
            "verified" => true,
            "verified_by" => "1",
            "verified_time" => "2019-01-01 00:00:00",
            "location" => "21.054037,105.731820",
        ]);
        DB::table('addresses')->insert([
            "name" => "Nhà hàng Đại Lâm Mộc",
            "photos" => '["/files/photos/quananvat.jpg"]',
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "user_id" => '2',
            "verified" => true,
            "verified_by" => "1",
            "verified_time" => "2019-01-01 00:00:00",
            "location" => "21.054037,105.731820",
        ]);
    }
}
