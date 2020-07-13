<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo',
            'email' => 'pablocastillo@mdp.cl',
            'password' => bcrypt('123456'),
            'admin' => true,
        ]);
    }
}
