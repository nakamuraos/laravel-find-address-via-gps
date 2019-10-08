<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('addresstypes');

        foreach($types as $type) {
            DB::table('types')->insert([
                "name" => $type
            ]);
        }
    }
}
