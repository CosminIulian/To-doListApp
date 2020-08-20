<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {

            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image uploaded!'); // succes message
        }
        return redirect()->back()->with('error', 'Image not uploaded!'); // fail message
    }
}
