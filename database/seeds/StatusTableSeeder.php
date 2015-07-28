<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class StatusTableSeeder extends Seeder {

    public function run() {

        Statu::create([
            'id'=>1,
            'name'=>'En Ruta'
        ]);
        Statu::create([
            'id'=>2,
            'name'=>'Entregado'
        ]);
        Statu::create([
            'id'=>3,
            'name'=>'Devolucion'
        ]);
        Statu::create([
            'id'=>4,
            'name'=>'No Entregado'
        ]);
        
    }

}
