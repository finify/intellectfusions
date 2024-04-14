<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userRecords = [
            // [
            //     'id'=> 1, 
            //     'name'=>'Mimi', 
            //     'email'=>'mimi@yahoo.com',  
            //     'password'=> Hash::make('12345678'),
            //     'user_type'=> 'user',
            //     'status'=>'1', 
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ]
            
            [
                'id'=> 2, 
                'name'=>'ifeanyi', 
                'email'=>'ifeanyi@yahoo.com',  
                'password'=> Hash::make('12345678'),
                'user_type'=> 'expert',
                'status'=>'1', 
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ];
        User::insert($userRecords);
    }
}
