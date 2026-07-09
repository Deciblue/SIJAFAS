<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{


    public function run(): void
    {


        /*
        |--------------------------------------------------------------------------
        | CREATE ROLES
        |--------------------------------------------------------------------------
        */


        $roles = [

            'student',

            'lecturer',

            'admin_sarpras',

            'head_sarpras',

            'technician',

            'leadership',

        ];



        foreach ($roles as $roleName) {


            Role::firstOrCreate([

                'name' => $roleName

            ]);


        }




        /*
        |--------------------------------------------------------------------------
        | CREATE SIJAFAS USERS
        |--------------------------------------------------------------------------
        */


        $users = [


            [
                'name' => 'Student SIJAFAS',
                'email' => 'student@sijafas.test',
                'role' => 'student',
            ],


            [
                'name' => 'Lecturer SIJAFAS',
                'email' => 'lecturer@sijafas.test',
                'role' => 'lecturer',
            ],


            [
                'name' => 'Admin Sarpras',
                'email' => 'admin@sijafas.test',
                'role' => 'admin_sarpras',
            ],


            [
                'name' => 'Head Sarpras',
                'email' => 'head@sijafas.test',
                'role' => 'head_sarpras',
            ],


            [
                'name' => 'Technician SIJAFAS',
                'email' => 'technician@sijafas.test',
                'role' => 'technician',
            ],


            [
                'name' => 'Leadership SIJAFAS',
                'email' => 'leader@sijafas.test',
                'role' => 'leadership',
            ],


        ];





        foreach ($users as $userData) {


            $role = Role::where(
                'name',
                $userData['role']
            )->first();



            User::updateOrCreate(

                [

                    'email' => $userData['email']

                ],


                [

                    'name' => $userData['name'],


                    'password' => Hash::make(
                        'password'
                    ),


                    'role_id' => $role->id,

                ]

            );


        }


    }


}