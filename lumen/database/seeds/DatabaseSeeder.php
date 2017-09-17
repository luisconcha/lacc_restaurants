<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(\App\User::class)->create([
            'email' => 'luvett11@gmail.com',
            'password' => app('hash')->make('123456')
        ]);
    }
}
