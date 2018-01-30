<?php

use Phinx\Seed\AbstractSeed;

class TypesSeeder extends AbstractSeed
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
        $data = [
            [
                'id' => 1,
                'label' => 'plant'
            ]
            ,
            [
                'id' => 2,
                'label' => 'fish'
            ]
        ];

        $types = $this->table('types');
        $types->insert($data)
            ->save();


    }
}
