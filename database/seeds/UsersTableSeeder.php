<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=factory(User::class)->times(10)->create();

        $user=User::find(1);
        $user->name='Eroko';
        $user->email='cloverqi@gmail.com';
        $user->save();
    }
}
