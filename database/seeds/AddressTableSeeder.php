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
            "image" => "../admin/assets/image/quananvat.jpg",
            "detail" =>  "126 Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "verify" => true,
            "location" => "21.057046, 105.730541",
            "user_id" => '1',
            "addresstype_id" => '5'         
        ]);
        DB::table('addresses')->insert([
            "name" => "Karaoke Chachacha 1",
            "image" => "../admin/assets/image/quananvat.jpg",
            "detail" =>  "số 57, Phố Nhổn, Xuân Phương, Từ Liêm, Hà Nội, Việt Nam",
            "verify" => true,
            "location" => "21.055339, 105.730855",
            "user_id" => '2',
            "addresstype_id" => '6'         
        ]);
        DB::table('addresses')->insert([
            "name" => "Nhà hàng Đại Lâm Mộc",
            "image" => "../admin/assets/image/quananvat.jpg",
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "verify" => true,
            "location" => "21.054037, 105.731820",
            "user_id" => '2',
            "addresstype_id" => '2'         
        ]);
        DB::table('addresses')->insert([
            "name" => "Nhà hàng Đại Lâm Mộc",
            "image" => "../admin/assets/image/quananvat.jpg",
            "detail" =>  "đường tái định cư, Phố Nhổn, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam",
            "verify" => true,
            "location" => "21.054037, 105.731820",
            "user_id" => '2',
            "addresstype_id" => '2'         
        ]);
    }
}
