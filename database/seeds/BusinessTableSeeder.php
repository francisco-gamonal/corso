<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class BusinessTableSeeder extends Seeder {

	public function run()
	{
		Busines::create([
                    'id'=>1,
                    'name'=>'Claro',
                    'logo'=>'claro/logo.png'
			]);
		
	}

}