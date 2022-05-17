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
        // PatientsTableSeeder の呼び出し
        $this->call([PatientsTableSeeder::class]);
    }
}
