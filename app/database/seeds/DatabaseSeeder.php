<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('Add_default_super_userTableSeeder');
		 $this->call('Add_regular_user_TableSeeder');
	}

}