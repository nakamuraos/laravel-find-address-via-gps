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
        DB::table('address_type')->insert([
            "address_id" => 1,
            "type_id" => 76
        ]);
        DB::table('address_type')->insert([
            "address_id" => 2,
            "type_id" => 76
        ]);
        DB::table('address_type')->insert([
            "address_id" => 3,
            "type_id" => 76
        ]);
    }
}
