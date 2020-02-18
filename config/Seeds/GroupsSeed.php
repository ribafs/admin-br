<?php
use Migrations\AbstractSeed;

/**
 * Groups seed.
 */
class GroupsSeed extends AbstractSeed
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
        $data = [
            [
                'id' => '1',
                'name' => 'Supers',
                'created' => '2016-08-30 21:15:01',
                'modified' => '2016-08-30 21:15:01',
            ],
            [
                'id' => '2',
                'name' => 'Admins',
                'created' => '2016-08-30 21:15:01',
                'modified' => '2016-08-30 21:15:01',
            ],
            [
                'id' => '3',
                'name' => 'Managers',
                'created' => '2016-08-30 21:15:01',
                'modified' => '2016-08-30 21:15:01',
            ],
            [
                'id' => '4',
                'name' => 'Users',
                'created' => '2016-08-30 21:15:01',
                'modified' => '2016-08-30 21:15:01',
            ],
        ];

        $table = $this->table('groups');
        $table->insert($data)->save();
    }
}
