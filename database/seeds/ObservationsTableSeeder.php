<?php

class ObservationsTableSeeder extends Seeder {

    public function run() {

        Observation::create([
            'id' => 1,
            'name' => 'Bajo puerta',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 2,
            'name' => 'Porch',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 3,
            'name' => 'Buzón',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 4,
            'name' => 'Recibido por el titular',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 5,
            'name' => 'Recibido por familiar',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 6,
            'name' => 'Recibido por comprañero de  trabajo',
            'statu_id' => 2
        ]);
        Observation::create([
            'id' => 7,
            'name' => 'Mala Dirección',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 8,
            'name' => 'Dirección incompleta',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 9,
            'name' => 'Cambio de dirección',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 10,
            'name' => 'Cambio de centro de trabajo',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 11,
            'name' => 'Desconocido en dirección',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 12,
            'name' => 'Está de vacaciones',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 13,
            'name' => 'Dirección en zona de alto riesgo',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 14,
            'name' => 'Dirección en blanco',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 15,
            'name' => 'Rechazada por el cliente',
            'statu_id' => 3
        ]);
        Observation::create([
            'id' => 16,
            'name' => 'No se Recibió',
            'statu_id' => 4
        ]);
    }

}
