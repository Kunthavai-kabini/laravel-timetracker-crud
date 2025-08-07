<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name=array('admin','user');
        $email=array('admin@gmail.com','user@gmail.com');
        $pwd=array('admin@123','user@123');
        foreach($name as $tk=>$tval){
            
            User::create([
                'name'=> $tval,
                'email'=>$email[$tk],
                'email_verified_at'=>now(),
                'remember_token' => Str::random(10),
                'password'=>Hash::make($pwd[$tk]),
                //'created_at'=>now(),
                //'updated_at'=>now(),
            ]);
          }
       
    }
}
