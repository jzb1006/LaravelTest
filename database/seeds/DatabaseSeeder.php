<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public  function run(){
//        $users = factory(User::class)->times(50)->make();
//        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
//
//        $user = User::find(1);
//        $user->name = 'Summer';
//        $user->email = 'summer@123.com';
//        $user->is_admin = true;
//        $user->save();
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(StatusesTabSeeder::class);
        Model::reguard();
    }
}
