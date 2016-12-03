<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ArcticlesController extends Controller
{
	public function index()
	{
		return "��������";
	}
	
    public function create()
	{
		$categories=Category::all(); //�������� ��� ���������
		return view('admin/articles/create',['categories'=>$categories]);
	}
	
	public function store(Request $request)
	{
		if($request->hasFile('preview')) //��������� ���� �� �������� ��������, ���� ������ ����� ���� � ��� ��������.
		{
			$date=date('d.m.Y'); //����������� ������� ����, ��� �� ����� ������ �������� ��� ��������
			$root=$_SERVER['DOCUMENT_ROOT']."/images/"; // ��� �������� ����� ��� �������� ��������
			if(!file_exists($root.$date))    {mkdir($root.$date);} // ���� ����� � ����� �� ����������, �� ������� ��
			$f_name=$request->file('preview')->getClientOriginalName();//���������� ��� �����
			$request->file('preview')->move($root.$date,$f_name); //���������� ���� � ����� � ������������ ������
			$all=$request->all(); //� ��������� $all ����� ������, ������� �������� ��� ��������� ������ � �����
			$all['preview']="/images/".$date."/".$f_name;// ������ �������� preview �� ���� ������, ����� � ���� ������� ���-�� ����� /tmp/sdfWEsf.tmp
			Article::create($all); //��������� ������ � ����
		}
		else
		{
			Article::create($request->all()); // ���� �������� �� ��������, �� ��������� ������, ��� ����.
		}
		return back()->with('message','������ ���������');
	}
}
