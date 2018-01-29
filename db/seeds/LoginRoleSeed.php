<?php

use Phinx\Seed\AbstractSeed;

class LoginRoleSeed extends AbstractSeed
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
                'type' => 'Admin'
            ],
            [
                'id' => 2,
                'type' => 'Member'
            ]
        ];

        $roles = $this->table('roles');
        $roles->insert($data)
            ->save();
    }
}
