<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserSneakersController extends Controller
{
    public function index($userSlug)
    {
        $user = User::where('slug', $userSlug)->firstOrFail();
        $sneakers = $user->sneakers()->paginate(10);

        return view('public.mysneakers.index',[
            'user'  => $user,
            'sneakers' => $sneakers
        ]);
    }
}