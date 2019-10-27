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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(AddressTypeTableSeeder::class);

        $this->createFolderPhotos();
        // $this->createFunctionDistance();
    }

    public function createFolderPhotos() {
        if ( !file_exists(public_path(config('files.paths.photo'))) ) {
            mkdir(public_path(config('files.paths.photo')), 0755, true);
        } else {
            $files = glob(public_path(config('files.paths.photo')).'/*'); // get all file names
            foreach($files as $file){ // iterate files
            if(is_file($file))
                @unlink($file); // delete file
            }
        }
        @copy(public_path('/assets/img/').'quananvat.jpg', public_path(config('files.paths.photo')).'quananvat.jpg');
    }

    public function createFunctionDistance() {
        $mysql_version_check = DB::select(DB::raw('SHOW VARIABLES LIKE "version";'));
        $mysql_version = $mysql_version_check[0]->Value;
        if (substr($mysql_version,2, 1) < '7' AND substr($mysql_version,4, 1) < '6') {
            $sql = '
                DELIMITER $$

                DROP FUNCTION IF EXISTS `ST_Distance_Sphere`$$
        
                CREATE FUNCTION `ST_Distance_Sphere` (point1 POINT, point2 POINT)
        
                    RETURNS FLOAT
                    no sql deterministic
                    BEGIN
                        declare R INTEGER DEFAULT 6371000;
                        declare `φ1` float;
                        declare `φ2` float;
                        declare `Δφ` float;
                        declare `Δλ` float;
                        declare a float;
                        declare c float;
                        set `φ1` = radians(y(point1));
                        set `φ2` = radians(y(point2));
                        set `Δφ` = radians(y(point2) - y(point1));
                        set `Δλ` = radians(x(point2) - x(point1));
        
                        set a = sin(`Δφ` / 2) * sin(`Δφ` / 2) + cos(`φ1`) * cos(`φ2`) * sin(`Δλ` / 2) * sin(`Δλ` / 2);
                        set c = 2 * atan2(sqrt(a), sqrt(1-a));
        
                        return R * c;
                    END$$
        
                DELIMITER ;
            ';
            DB::unprepared($sql);
        }
    }
}
