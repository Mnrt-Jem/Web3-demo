<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use App\Models\UserItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function getItems()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        $Items = Items::getItems();
        return response()->json($Items, 200);
    }
    public function buyItem(Request $request)
    {
        $user = Auth::user();
        User::setUserItem($user->id, $request->itemId);
    }
}
