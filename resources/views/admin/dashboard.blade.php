@extends('admin/main')
@section('content')
	<h2>Статьи</h2>
	<ul>
	<li><a href="/adminzone/articles">Все статьи</a></li>
	<li><a href="/adminzone/articles/create">Добавить статью</a></li>
	</ul>
	<h2>Категории</h2>
	<ul>
	<li><a href="/adminzone/categories/">Все категории</a></li>
	<li><a href="/adminzone/categories/create">Добавить категорию</a></li>
	</ul>
	<h2>Комментарии</h2>
	<ul>
	<li><a href="/adminzone/comments">Все комментарии</a></li>
	<li><a href="{{action('CommentsController@show')}}">Управление комментариями</a></li>
	</ul>
	<h2>Страницы</h2>
	<ul>
	</ul>
@stop