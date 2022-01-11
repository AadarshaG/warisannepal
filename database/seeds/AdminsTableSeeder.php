<?php

use Illuminate\Database\Seeder;
use DB as DBS;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'name'=>'Admin',
                'email'=>'adminwitn2021@gmail.com',
                'password'=>Hash::make('adminwitn2021@gmail.com!@#$%'),
                'role'=>'admin',
            )
        );
        DBS::table('admins')->insert($users);
    }
}
