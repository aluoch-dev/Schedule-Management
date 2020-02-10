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
        DB::table('roles')->insert(array(
            array(
            'role_name' => 'Admin',
            'role_description' => 'Site administrator',
            ),
            array(
            'role_name' => 'Employee',
            'role_description' => 'Employee of the company'
            ),
        ));

        DB::table('users')->insert(array(
            array(
                'role' => 'admin',
                'first_name' => 'Allan',
                'last_name'=>'Poe',
                'email' => 'admin@mail.com',
                'mobile_no' => '254725315511',
                'password' => Bcrypt('admin'),
            ),
            array(
                'role' => 'employee',
                'first_name' => 'Ivy',
                'last_name' => 'Wanjaa',
                'email' => 'ivy@mail.com',
                'mobile_no' => '112233',
                'password' => Bcrypt('123456'),
            )
        ));

        DB:: table('systems')->insert(array(
            array(
                'system_name'=> 'POS',
                'system_description' => 'a point of sale system',
            ),
            array(
                'system_name'=> 'PMS',
                'system_description' => 'a property management system',
            )
        ));

        DB::table('tasks')->insert(array(
            array(
                'task_name' =>'installation',
                'task_description' => 'new installation'
            ),
            array(
                'task_name' => 'training',
                'task_description' =>'training users'
            )
            ));
            
        DB::table('statuses')->insert(array(
            array(
                'status_name' =>'unassigned',
                'status_description' => 'not yet tasked'
            ),
            array(
                'status_name' => 'assigned',
                'status_description' =>'tasked'
            ),
            array(
                'status_name' => 'ongoing',
                'status_description' =>'being handled at the moment'
            ),
            array(
                'status_name' => 'concluded',
                'status_description' =>'case closed'
            )
            ));
    }
}
