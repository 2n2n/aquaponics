<?php
use Migrations\AbstractSeed;

/**
 * LoginRoleSeed seed.
 */
class LoginRoleSeedSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('login_role_seeds');
        $table->insert($data)->save();
    }
}
