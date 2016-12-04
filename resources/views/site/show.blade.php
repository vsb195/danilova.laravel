@extends('site.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading"><img src="{{$article->preview}}" style="width:100%;"></div>

                <div class="panel-body">
                    <h2>{{$article->title}}</h2>
					<small>Дата статьи: {{$article->updated_at}}</small>
					<div>
					{{$article->content}}
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection