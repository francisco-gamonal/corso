<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
                $this->call('StatusTableSeeder');
                $this->call('ObservationsTableSeeder');
                $this->call('CitysTableSeeder');
                $this->call('BusinessTableSeeder');
                $this->call('ProductsTableSeeder');
                $this->call('TypeUsersTableSeeder');
	 $this->call('UsersTableSeeder');
		// $this->call('UserTableSeeder');
	}

}
