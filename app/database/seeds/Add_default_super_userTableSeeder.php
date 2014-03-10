<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use EmberCasters\Models\User as User;
use EmberCasters\Models\Role as Role;

class Add_default_super_userTableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();

        $user = User::create([
            'first_name' => 'Lamin',
            'last_name' => 'Sanneh',
            'email' => 'lamin.evra@gmail.com',
            'password' => Hash::make('vicecity'),
            'email_confirmed' => true,
            'receive_updates' => true
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $superUserRoleId = Role::where('name','LIKE',"%super%")->first(array('id'))->id;
        $user->addRole($superUserRoleId)->save();
    }

}