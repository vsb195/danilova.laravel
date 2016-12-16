<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Блог</title>
        <meta name="description" value="{{$article->meta_description}}">
        <meta name="keywords" value="{{$article->meta_keywords}}">
    </head>
    <body>
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

    </body>
</html>
