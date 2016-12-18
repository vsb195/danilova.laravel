@extends('site.main')

@section('content')
        <h2>{{$page->title}}</h2>
        <div>{!! $page->content !!}</div>
		
@endsection