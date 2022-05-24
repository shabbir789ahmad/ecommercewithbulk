<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
class StateController extends Controller
{
    function states()
    {
        $states=State::states();
        return response()->json($states);
    }
}
