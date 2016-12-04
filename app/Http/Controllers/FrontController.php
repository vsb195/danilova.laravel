<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
	{
		$articles=Article::where('public','=',1)->get();
		return view('site/index',['articles'=>$articles]);
	}
	
	public function show($id)
	{
		$article=Article::where('public','=',1)->find($id); //показываем статью если она опубликована
		return view('site/show',['article'=>$article]);
	}

}
