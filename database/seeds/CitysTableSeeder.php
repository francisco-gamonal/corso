<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class CitysTableSeeder extends Seeder {

    public function run() {
        City::create([
            'id'=>1,
            'name'=>'ATLANTIDA'
        ]);
        City::create([
            'id'=>2,
            'name'=>'COPAN'
        ]);
        City::create([
            'id'=>3,
            'name'=>'CORTES'
        ]);
        City::create([
            'id'=>4,
            'name'=>'COLON'
        ]);
        City::create([
            'id'=>5,
            'name'=>'COMAYAGUA'
        ]);
        City::create([
            'id'=>6,
            'name'=>'CHOLUTECA'
        ]);
        City::create([
            'id'=>7,
            'name'=>'EL PARAISO'
        ]);
        City::create([
            'id'=>8,
            'name'=>'INTIBUCA'
        ]);
        City::create([
            'id'=>9,
            'name'=>'GRACIAS A DIOS'
        ]);
        City::create([
            'id'=>10,
            'name'=>'FRANCISCO MORAZAN'
        ]);
        City::create([
            'id'=>11,
            'name'=>'LEMPIRA'
        ]);
        City::create([
            'id'=>12,
            'name'=>'LA PAZ'
        ]);
        City::create([
            'id'=>13,
            'name'=>'OLANCHO'
        ]);
        City::create([
            'id'=>14,
            'name'=>'OCOTEPEQUE'
        ]);
        City::create([
            'id'=>15,
            'name'=>'SANTA BARBARA'
        ]);
        City::create([
            'id'=>16,
            'name'=>'ISLAS DE LA BAHIA'
        ]);
        City::create([
            'id'=>17,
            'name'=>'VALLE'
        ]);
        City::create([
            'id'=>18,
            'name'=>'YORO'
        ]);
    }

}
