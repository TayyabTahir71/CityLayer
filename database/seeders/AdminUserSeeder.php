<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminUserSeeder extends Seeder
{

    public function run()
    {
        User::firstOrCreate(
            ['email' => 'xmicky@hotmail.fr'],
            ['name' => 'Mika0000', 'email' => 'xmicky@hotmail.fr',  'password' => bcrypt('123456'), 'role' => 'admin']);
       
            User::create( [
                'id'=>2,
                'name'=>'moi',
                'email'=>NULL,
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$LaM.g2KcnHgRlyITFtU4UOe0RZTkc.M3wn9525nsq2v2QlWJ3Zj/y',
                'avatar'=>'avatar.png',
                'role'=>'user',
                'firstuse'=>1,
                'remember_token'=>NULL,
                'created_at'=>'2023-03-22 09:31:36',
                'updated_at'=>'2023-03-22 09:31:36'
                ] );
                            
                User::create( [
                'id'=>3,
                'name'=>'firas',
                'email'=>NULL,
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$RXUTqRyovmqTqVtPUkn1DO6DzwQtZytMgzS8cyfdi8saNcyxSyCx6',
                'avatar'=>'avatar.png',
                'role'=>'user',
                'firstuse'=>1,
                'remember_token'=>NULL,
                'created_at'=>'2023-03-23 12:28:40',
                'updated_at'=>'2023-03-23 12:28:40'
                ] );
                            
                User::create( [
                'id'=>4,
                'name'=>'Angelos',
                'email'=>NULL,
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$JRct2eqJOUOBK0uudahbUOL0cNTyzcsZ9lS7QddFO7MRqLrJoaX2S',
                'avatar'=>'avatar.png',
                'role'=>'user',
                'firstuse'=>1,
                'remember_token'=>NULL,
                'created_at'=>'2023-03-23 13:50:27',
                'updated_at'=>'2023-03-23 13:50:27'
                ] );
                            
                User::create( [
                'id'=>5,
                'name'=>'fred-simard',
                'email'=>NULL,
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$nVUKSmZeekw78V4Xf30CA.EJNOVPDWgB0tUHX48xXBuWgufwrKzPi',
                'avatar'=>'avatar.png',
                'role'=>'user',
                'firstuse'=>1,
                'remember_token'=>NULL,
                'created_at'=>'2023-03-23 16:06:56',
                'updated_at'=>'2023-03-23 16:06:56'
                ] );
    }
}
