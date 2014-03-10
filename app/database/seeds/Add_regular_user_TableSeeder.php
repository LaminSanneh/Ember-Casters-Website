<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use EmberCasters\Models\User as User;
use EmberCasters\Models\Role as Role;

class Add_regular_user_TableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $user = User::create([
            'first_name' => 'Lamin',
            'last_name' => 'Sanneh',
            'email' => 'lamin.sanneh@gmail.com',
            'password' => Hash::make('cityvice'),
            'email_confirmed' => true,
            'receive_updates' => true
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $regularUserRoleId = Role::where('name','LIKE',"%regular%")->first(array('id'))->id;
        $user->addRole($regularUserRoleId)->save();
    }

}