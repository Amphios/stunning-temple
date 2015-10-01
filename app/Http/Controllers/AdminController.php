<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.admin');
    }

    public function addGems()
    {

    }

    public function addMoney()
    {

    }

    public function addStars()
    {

    }
}
