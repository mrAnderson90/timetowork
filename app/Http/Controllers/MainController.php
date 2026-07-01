<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('main.index', [
            'isGuest' => !$user,
            'isApplicant' => $user?->isApplicant() ?? false,
            'isEmployer' => $user?->isEmployer() ?? false,
        ]);
    }
}
