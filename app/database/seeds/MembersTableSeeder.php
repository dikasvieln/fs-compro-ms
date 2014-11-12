<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
			Member::create([
				'email' => 'admin@admin.com',
				'username' => 'admin',
				'password' => Hash::make('admin1234'),
				'password_temp' => Hash::make('admin1234'),
				'active' => 1
			]);
		// }
	}

}