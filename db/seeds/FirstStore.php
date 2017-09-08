<?php

use Phinx\Seed\AbstractSeed;

class FirstStore extends AbstractSeed
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
      $this->execute('TRUNCATE stores');

      $data = [
          [
            'name' => 'Larissa Noivas',
            'description' => 'Loja de vestidos',
            'img_adress' => '',
            'city' => 'Sao Joao del Rei'
          ],
          [
            'name' => 'Teste',
            'description' => 'Buffet',
            'img_adress' => '',
            'city' => 'Sao Joao del Rei'
          ]
      ];

      $appnoiva = $this->table('stores');
      $appnoiva->insert($data)
              ->save();
    }
}
