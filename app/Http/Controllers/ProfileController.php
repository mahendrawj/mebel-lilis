<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;
class ProfileController extends Controller
{
    public function Profile() {
        $profile= Company::all();
        return view('profile.profile', compact('profile'));
    }
}
