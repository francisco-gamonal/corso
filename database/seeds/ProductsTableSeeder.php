<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		Product::create([
                    'id'=>1,
                    'name'=>'Ciclo C-46 TV',
                    'busines_id'=>1
			]);
                Product::create([
                    'id'=>2,
                    'name'=>'Ciclo C-46 Movil',
                    'busines_id'=>1
			]);
                Product::create([
                    'id'=>3,
                    'name'=>'Ciclo C-48',
                    'busines_id'=>1
			]);
		
	}

}