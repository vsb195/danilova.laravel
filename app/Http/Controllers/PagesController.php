<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($id)
	{
		$page = Page::where('public', '=', 1)->find($id);
		return view('site/main', ['page'=>$page]);
	}
}
