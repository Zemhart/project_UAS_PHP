<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Kuncoro Yoko',
        'email'    => 'yoko@dhunt.org',
        'password' => Hash::make('yoko'),
    ));
}

}
