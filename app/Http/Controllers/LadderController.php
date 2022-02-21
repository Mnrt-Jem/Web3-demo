<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LadderController extends Controller
{
    public function getLadder($ladderFormat)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");

        $Ladderboard = Games::getLadder($ladderFormat);
        return response()->json($Ladderboard, 200);
    }
}
