<?php

class TypeTableSeeder extends Seeder {

    public function run() {

        Type::create([
            'id' => 1,
            'name' => 'Administrador'
        ]);
        Type::create([
            'id' => 2,
            'name' => 'Editores'
        ]);
        Type::create([
            'id' => 3,
            'name' => 'Claro'
        ]);
    }

}
