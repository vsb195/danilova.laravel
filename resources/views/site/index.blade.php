@extends('site.main')

@section('content')
	@foreach($articles as $article)
	<!-- Post -->
	<article class="box post post-excerpt">
		<header>
			<!--
				Note: Titles and subtitles will wrap automatically when necessary, so don't worry
				if they get too long. You can also remove the <p> entirely if you don't
				need a subtitle.
			-->
			<h2><a href="{{action('FrontController@show',['id'=>$article->id])}}">{{$article->title}}</a></h2>
			<p>Дата статьи: {{$article->updated_at}}</p>
		</header>
		<div class="info">
			<!--
				Note: The date should be formatted exactly as it's shown below. In particular, the
				"least significant" characters of the month should be encapsulated in a <span>
				element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
				Oh, and if you don't need a date for a particular page or post you can simply delete
				the entire "date" element.
				
			-->
			<span class="date"><span class="month">Дек<span>y</span></span> <span class="day">{{$article->updated_at->day}}</span><span class="year">, 2016</span></span>
			<!--
				Note: You can change the number of list items in "stats" to whatever you want.
			-->
			<ul class="stats">
				<li><a href="{{action('FrontController@show',['id'=>$article->id])}}" class="icon fa-comment">{{$article->comments()->where('public', '=', '1')->count()}}</a></li>
			</ul>
		</div>
		<a href="{{action('FrontController@show',['id'=>$article->id])}}" class=" image featured ">
			<div class="img-block">
				<img class="article-list-image" src="{{$article->preview}}" alt="{{$article->title}}" />
			</div>
		</a>
		<!--<p>
			<strong>Hello!</strong> You're looking at <strong>Striped</strong>, a fully responsive HTML5 site template designed by <a href="http://n33.co">AJ</a>
			for <a href="http://html5up.net">HTML5 UP</a> It features a clean, minimalistic design, styling for all basic page elements (including blockquotes, tables and lists), a
			repositionable sidebar (left or right), and HTML5/CSS3 code designed for quick and easy customization (see code comments for details).
		</p>
		<p>
			Striped is released for free under the <a href="http://html5up.net/license">Creative Commons Attribution license</a> so feel free to use it for personal projects
			or even commercial ones &ndash; just be sure to credit <a href="http://html5up.net">HTML5 UP</a> for the design. If you like what you see here, be sure to check out
			<a href="http://html5up.net">HTML5 UP</a> for more cool designs or follow me on <a href="http://twitter.com/n33co">Twitter</a> for new releases and updates.
		</p>-->
	</article>
	@endforeach
@endsection