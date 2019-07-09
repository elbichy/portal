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
        $this->call(UsersTableSeeder::class);
        $this->call(CadreTableSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(LGAtableSeeder::class);
    }
}
