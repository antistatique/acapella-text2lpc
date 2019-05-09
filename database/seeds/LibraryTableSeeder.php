<?php

use Illuminate\Database\Seeder;
use App\Library;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Library::create([
            'public' => true,
            'default' => true,
            'user_id' => 1,
        ]);
    }
}
