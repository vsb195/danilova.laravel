<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Блог</title>
<meta name="description" value="{{$article->meta_description}}">
<meta name="keywords" valeu="{{$article->meta_keywords}}">
</head>
<body>
<img src="{{$article->preview}}"><br>
<h2>{{$article->title}}</h2>
<small>Дата статьи: {{$article->updated_at}}</small>
<div>
{{$article->content}}
</div>
</body>
</html>