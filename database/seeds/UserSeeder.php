<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'photo' => '',
                'name' => 'Ristorante da Davide',
                'email' => 'davidedeleonardis1711@gmail.com',
                'password' => '12345678',
                'address' => 'Piazza Umberto 47',
                'phone' => '33353364734',
                'p_iva' => '12345678911',
            ],
            [
                'photo' => '',
                'name' => 'Ristorante da Manuel',
                'email' => 'manuelcappello7@gmail.com',
                'password' => '12345678',
                'address' => 'Piazza Umberto 47',
                'phone' => '33353364732',
                'p_iva' => '12345898911',
            ],
            [
                'photo' => '',
                'name' => 'Ristorante da Christian',
                'email' => 'christian@gmail.com',
                'password' => '12345678',
                'address' => 'Piazza Umberto 47',
                'phone' => '33353364731',
                'p_iva' => '12367678911',
            ],
            [
                'photo' => '',
                'name' => 'Ristorante da Semola',
                'email' => 'semola@gmail.com',
                'password' => '12345678',
                'address' => 'Piazza Umberto 47',
                'phone' => '33353364737',
                'p_iva' => '12455678911',
            ],
            [
                'photo' => '',
                'name' => 'Ristorante da Dario',
                'email' => 'dario@gmail.com',
                'password' => '12345678',
                'address' => 'Piazza Umberto 47',
                'phone' => '33353364738',
                'p_iva' => '12345238911',
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->photo = $user['photo'];
            $newUser->name = $user['name'];
            $newUser->slug = Str::slug("$newUser->name", '-');
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->address = $user['address'];
            $newUser->phone = $user['phone'];
            $newUser->p_iva = $user['p_iva'];

            $newUser->save();
        }
    }
}
