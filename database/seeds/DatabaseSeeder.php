<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ( !file_exists(public_path(config('files.paths.photo'))) ) {
            mkdir(public_path(config('files.paths.photo')), 0755, true);
        } else {
            $files = glob(public_path(config('files.paths.photo')).'/*'); // get all file names
            foreach($files as $file){ // iterate files
            if(is_file($file))
                @unlink($file); // delete file
            }
        }
        copy(public_path('/assets/img/').'quananvat.jpg', public_path(config('files.paths.photo')).'quananvat.jpg');
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(AddressTypeTableSeeder::class);
    }
}
