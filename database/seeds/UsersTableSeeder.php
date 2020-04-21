<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usr = new User;
        $usr->fullname = 'Diego de los Rios';
        $usr->email = 'delosrios169@gmail.com';
        $usr->phone = '382932322';
        $usr->birthdate = '1995-02-12';
        $usr->gender = 'Male';
        $usr->address = 'Calle falsa 43 23';
        $usr->password = bcrypt('admin');
        $usr->role = 'admin';
        $usr->save();

        factory(App\User::class, 10)->create();
    }
}
