<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function getItems()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        $Items = Items::getItems();
        return response()->json($Items, 200);
    }
}
