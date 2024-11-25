<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function tmp_login(Request $request)
    {
        $user = User::find($request->id);
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }
    //
}
