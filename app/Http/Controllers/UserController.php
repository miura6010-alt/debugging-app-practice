<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        Log::info('ユーザー登録処理が開始されました。');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Log::info('ユーザーが作成されました。ID: ', ['user_id' => $user->id]);

        return redirect('/users');
    }
}
