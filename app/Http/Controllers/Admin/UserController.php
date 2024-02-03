<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index()
    {

        return view('admin.user.index', [
            'users' => Users::class,
        ]);
    }
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user' => $user
        ]);
    }
}
