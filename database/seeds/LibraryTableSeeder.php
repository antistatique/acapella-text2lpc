<?php

use App\Library;
use Illuminate\Database\Seeder;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Library::create([
            'public'  => true,
            'default' => true,
            'user_id' => 1,
            'name'    => 'Défaut',
        ]);
    }
}
