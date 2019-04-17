<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //times(50) 代表生成50个用户
        //你也可以在生成数据的时候生成一个自定义的数据
        $users = factory(User::class)->times(50)->make();
        // User::insert($users->toArray());
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
        $user = User::find(1);
        $user->name = 'jzb1006';
        $user->email = '1129990545@qq.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }

}
