<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'super',
                'password' => '$2y$10$JSDAQhVzicXNOPsiFxSqL.w0tAO6GDCxUMxR.uP3yWMYUTBtv6W8.',
                'group_id' => '1',
                'created' => '2016-09-15 15:57:16',
                'modified' => '2019-04-06 09:53:44',
            ],
            [
                'id' => '2',
                'username' => 'admin',
                'password' => '$2y$10$TGZG6d.9XCIh.y0qAuvNlupylnG7CR8fP7OvD1tGesNmbXdPLhyYi',
                'group_id' => '2',
                'created' => '2016-09-15 15:57:28',
                'modified' => '2019-05-24 20:33:02',
            ],
            [
                'id' => '3',
                'username' => 'manager',
                'password' => '$2y$10$fx0/o/XU3WPO5.nnP7cnCeSuFsFjxCMkk72DciLqABzHp50cOFnre',
                'group_id' => '3',
                'created' => '2016-09-15 15:57:39',
                'modified' => '2019-05-24 20:33:15',
            ],
            [
                'id' => '4',
                'username' => 'user',
                'password' => '$2y$10$BFj76H6cjH7D7pDxFFtEmu57HlJfKGPfmUEnl5zeRwxVtCMRCyxNG',
                'group_id' => '4',
                'created' => '2016-09-15 15:58:21',
                'modified' => '2019-05-24 20:33:31',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
