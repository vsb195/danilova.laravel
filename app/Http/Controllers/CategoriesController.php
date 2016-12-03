<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
	public function index()
	{
		$categories=Category::all();
		return view('admin/categories/categories',['categories'=>$categories]);
	}
    public function create()
	{
		return view('admin/create');
	}
	
	public function store(Request $request)
    {
        Category::create($request->all());
        return back()->with('message','Категория добавлена');
    }
	
	public function destroy($id)
	{		
		$category=Category::find($id); 
		$category->delete();
		return back()->with(array('message'=>"Категория ".$category->title." удалена"));
	}
	
	public function edit($id)
	{
		$category=Category::find($id);
		return view('admin/categories/edit',['category'=>$category]);
	}
	
	public function update(Request $request,$id)
	{
		$category=Category::find($id);
		$category->update($request->all());
		$category->save();
		return back()->with('message','Категория обновлена');
	}
}
