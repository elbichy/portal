<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $users = [
        //     [
        //         'firstname' => 'Suleiman',
        //         'lastname' => 'Abdulrazaq',
        //         'email' => 'suleiman.bichi@gmail.com',
        //         'password' => Hash::make('@Suleimanu1'),
        //         'phone' => '08050811702',
        //         'cadre_id' => 1,
        //         'rank_id' => 2,
        //         'hasSubmitted' => 1,
        //         'isAdmin' => 1
        //     ],
        //     [
        //         'firstname' => 'Usman',
        //         'lastname' => 'Shuaibu',
        //         'email' => 'usman@gmail.com',
        //         'password' => Hash::make('@Suleimanu1'),
        //         'phone' => '08150811702',
        //         'cadre_id' => 1,
        //         'rank_id' => 2,
        //         'hasSubmitted' => 1,
        //         'isAdmin' => 0
        //     ]
        // ];

        // foreach($users as $user){
        //     User::create($user);
        // }

        User::create([
            'firstname' => 'Suleiman',
            'lastname' => 'Abdulrazaq',
            'email' => 'suleiman.bichi@gmail.com',
            'password' => Hash::make('@Suleimanu1'),
            'phone' => '08050811702',
            'cadre_id' => 1,
            'rank_id' => 2,
            'hasSubmitted' => 1,
            'isAdmin' => 1,
            'isShortlisted' => 0
        ]);
        factory(App\User::class, 5000)
        ->create()
        ->each(function ($user) {
            $user->personal()->save(factory(App\Personal::class)->make());
        })
        ->each(function ($user) {
            $user->contact()->save(factory(App\Contact::class)->make());
        });
    }
}
