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
	<li><a href="{{action('CommentsController@show')}}">Управление комментариями</a></li>
	</ul>
	<h2>Страницы</h2>
	<ul>
		@if (count($menu) > 1)
			<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              ... <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
				@foreach($menu as $item)
					<li><a href="{{action('PagesController@learn',['id'=>$item->id])}}">{{$item->title}}</a></li>
				@endforeach
                          </ul>
			</li>
		@else					
			@foreach($menu as $item)
					<li><a href="{{action('PagesController@learn',['id'=>$item->id])}}">{{$item->title}}</a></li>
			@endforeach
		@endif
	</ul>
@stop