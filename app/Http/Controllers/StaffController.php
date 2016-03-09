<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public $crumbs = [];

    public function index()
    {
    	$data['employees'] = \App\Page::where('slug', 'starfsfolk')->get()->getSubs();
        return view('frontend.starfsfolk')->with($data);
    }

    // Sýnir annaðhvort vöru eða flokk
    public function show($slug)
    {
    	$data['employee'] = \App\Page::where('slug', $slug)->first();
        return view('frontend.starfsmadur')->with($data);
    }
}
