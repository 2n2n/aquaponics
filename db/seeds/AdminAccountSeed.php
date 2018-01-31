<?php

use Phinx\Seed\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
class AdminAccountSeed extends AbstractSeed
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
        $user = [
            'id' => 1,
            'firstname' => 'admin',
            'mi' => 'is',
            'lastname' => 'trator',
            'contactnumber' => '00000000',
            'email' => 'admin@admin.com'
        ];
        $userquery = $this->table('users');
        $userquery->insert($user)->save();

        $hasher = new DefaultPasswordHasher;
        $login = [
            'id' => 1,
            'username' => 'admin',
            'password' => $hasher->hash('asdf1234**'),
            'roles_id' => 1,
            'users_id' => 1
        ];
        $userquery = $this->table('logins');
        $userquery->insert($login)->save();

    }
}
