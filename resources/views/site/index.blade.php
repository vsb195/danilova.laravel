@extends('site.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Список статей</div>

                <div class="panel-body">
                    @foreach($articles as $article)
						<h2><a href="{{action('FrontController@show',['id'=>$article->id])}}">{{$article->title}}</a></h2>
						<small>Дата статьи: {{$article->updated_at}} Коментариев: {{$article->comments()->where('public', '=', '1')->count()}}</small>					
						<div>
							<img src="{{$article->preview}}" style="width:100%;">{{str_limit($article->content, 150)}}
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection