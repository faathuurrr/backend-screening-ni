<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $api_title = env('APP_NAME') . " - version 1";
        return $this->successResponse("Welcome to $api_title", [
            'title' => $api_title,
            'route' => url('/api')
        ]);
    }
}
