<?php

use Phinx\Seed\AbstractSeed;

class FirstCity extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
      $this->execute('TRUNCATE cities');

      $data = [
          [
            'name' => 'São João del Rei',
            'state' => 'Minas Gerais',
          ]
      ];

      $appnoiva = $this->table('cities');
      $appnoiva->insert($data)
              ->save();
    }
}
