@extends('site.main')

@section('content')
		<div class="img-block">
			<img class="article-list-image" src="{{$article->preview}}" style="width:100%;">
		</div>
        <h2>{{$article->title}}</h2>
        <small>Дата статьи: {{$article->updated_at}}</small>
        <div>{!! $article->content !!}</div>
        @if($article->comments_enable==1)
          @include('site.comment')
        @endif
		<div class="comments">
			<ul>
			@foreach($comments as $comment)
				<li>
					Автор: {{$comment->author}}<br>
					{{$comment->content}}
				</li>
			@endforeach
			</ul>
		</div>
@endsection