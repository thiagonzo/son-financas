<?php

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $users = $this->table('users');
        $users->insert([
            'first_name' => 'Thiago',
            'last_name' => 'Rodrigues',
            'email' => 'thiagonzo@gmail.com',
            'password' => '123456',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])->save();
        $data=[];
        foreach(range(1,3) as $value){
            $data[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => '123456',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $users->insert($data)->save();
    }
}
