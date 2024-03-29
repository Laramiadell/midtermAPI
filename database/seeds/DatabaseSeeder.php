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
        $this->call(StudentsSeeder::class);
         $this->call(BooksSeeder::class);
         $this->call(BorrowsSeeder::class);
    }
}
