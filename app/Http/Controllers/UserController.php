<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->birthday = $request->birthday;
        $user->nationality = $request->nationality;
        $user->qualified_investor = $request->qualified_investor;
        $user->rfc = $request->rfc;
        $user->street = $request->street;
        $user->neighborhood = $request->neighborhood;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->clabe = $request->clabe;
        $user->id_image = $request->id_image;

        $user->save();
    }

    public function saveImage(Request $request)
    {
        $path = Storage::putFile('public/ids', $request->file('image'), 'public');

        return substr($path, 7);
    }
}
