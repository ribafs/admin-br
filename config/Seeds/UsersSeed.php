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
                'password' => '$2y$10$XPWeblQCdPrXIbQzMaBCw.DOHFalF62TH
Z8XbwzA3qUgFVZhbZteC',
                'group_id' => '2',
                'created' => '2016-09-15 15:57:28',
                'modified' => '2019-04-06 09:54:01',
            ],
            [
                'id' => '3',
                'username' => 'manager',
                'password' => '$2y$10$CuHXN/I.fsDjwDD4eW.bie2P3F4Kvy3Uof18diZwrsshUrK8dmqx2',
                'group_id' => '3',
                'created' => '2016-09-15 15:57:39',
                'modified' => '2019-04-06 09:54:15',
            ],
            [
                'id' => '4',
                'username' => 'user',
                'password' => '$2y$10$Dp.70puQvgpsdkIxraND0.vuL8TNRIYLncGQEg6NoCdPJGy0fdXgW',
                'group_id' => '4',
                'created' => '2016-09-15 15:58:21',
                'modified' => '2019-04-06 09:54:28',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
