<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Provider\Company;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
