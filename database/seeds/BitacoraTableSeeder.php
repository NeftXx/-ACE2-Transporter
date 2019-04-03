<?php

use Illuminate\Database\Seeder;

class BitacoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bitacora::class, 100)->create();
    }
}
