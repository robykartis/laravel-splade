<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tables\Users as UsersTable;
use ProtoneMedia\Splade\Facades\SEO;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User';
        return view('admin.user.index', [
            'users' => UsersTable::class,
            'title' => $title
        ]);
    }
    public function show(User $user)
    {
        $title = $user->name;
        // dd($title);
        return view('admin.user.show', [
            'user' => $user,
            'title' => $title
        ]);
    }
}
