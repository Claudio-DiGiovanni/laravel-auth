<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Frano peppino',
                'email'     => 'qwer@qwer.qwer',
                'password'  =>  Hash::make('qwer'),
            ],
            [
                'name'      => 'Giorgioloide Zuzzupazzo',
                'email'     => 'asdf@asdf.asdf',
                'password'  =>  Hash::make('asdf'),
            ],
            [
                'name'      => 'Jonny joe',
                'email'     => 'zxcv@zxcv.zxcv',
                'password'  =>  Hash::make('zxcv'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
    }
}
}
