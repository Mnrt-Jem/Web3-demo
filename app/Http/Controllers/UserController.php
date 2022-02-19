<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getReward()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        /*
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $player = Player::create($request->all());

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(201);
        */
        $user = Auth::user();
        $reward = User::getUserReward($user->id);
        return response()->json($reward, 200);
    }
}
