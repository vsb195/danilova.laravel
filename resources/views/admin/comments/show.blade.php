@extends('admin.main')
@section('content')
<table>
    <tr>
        <td>Статья</td>
        <td>Автор</td>
        <td>Email</td>
        <td>Комментарий</td>
        <td>Дата</td>
        <td>Статус</td>
        <td>Действие</td>
    </tr>
    @foreach($comments as $comment)
    <tr>
        <td>{{$comment->article}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->content}}</td>
        <td>{{$comment->created_at}}</td>
        <td>{{$comment->public}} (
		@if($comment->public == 0)
          не 
        @endif 
опубликован)
		</td>
        <td><a href="{{action('CommentsController@delete', ['id'=>$comment->id])}}">Удалить</a>
		@if($comment->public != 1)
          <a href="{{action('CommentsController@published', ['id'=>$comment->id])}}">Опубликовать</a>
        @endif        
        </td>
    </tr>
    @endforeach
</table>
@endsection
