@extends('admin.main')
@section('content')
	<script src="{{asset('js/nicEdit.js')}}"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<form method="POST" action="{{action('ArticlesController@update',['articles'=>$article->id])}}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="put">
Превью:<br>
@if(!empty($article->preview))
<img src="{{$article->preview}}">
@endif
<input type="file" name="preview"><br>
Название статьи:<br>
<input type="text" name="title" value="{{$article->title}}"><br>
Текст статьи:<br>
<textarea name="content" style="width: 100%;">{{$article->content}}</textarea><br>
Категория:<br>
<select name="category_id">
@foreach($categories as $category)
@if($article->category_id==$category->id)
<option value="{{$category->id}}" selected>{{$category->title}}</option>
@else
<option value="{{$category->id}}">{{$category->title}}</option>
@endif
@endforeach
</select>
<br>
Разрешить комментарии?<br>
<select name="comments_enable">
<option value="1">Да</option>
<option value="0">Нет</option>
</select>
<br>
Опубликовать?<br>
<select name="public">
<option value="1">Да</option>
<option value="0">Нет</option>
</select>
<br>
<h2>Мета</h2>
description:<br>
<input type="text" name="meta_description"><br>
keywords:<br>
<input type="text" name="meta_keywords"><br>
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="submit" value="Сохранить">
</form>
@if(Session::has('message'))
{{Session::get('message')}}
@endif
@endsection