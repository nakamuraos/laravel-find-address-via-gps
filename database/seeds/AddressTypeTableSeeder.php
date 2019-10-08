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
        $types = config('addresstypes');
        foreach($types as $key => $type) {
            DB::table('address_type')->insert([
                "address_id" => rand(1,4),
                "type_id" => $key+1,
            ]);
            if($key > 10) break;
        }
    }
}
