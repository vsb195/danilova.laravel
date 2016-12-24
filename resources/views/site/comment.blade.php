	
@if (Auth::user())

<br><br>
<form method="POST">
    Ваше имя: {{Auth::user()->name}}<br>
    <input type="hidden" name="author" value="{{Auth::user()->name}}"  >
    Ваш email: {{Auth::user()->email}}<br>
    <input type="hidden" name="email" value="{{Auth::user()->email}}"  >
    Ваше сообщение:<br>
    <textarea name="content" style="width: 100%;" id="editor"></textarea><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="Отправить">
</form>

	@if(Session::has('message'))
		{{Session::get('message')}} <!-- здесь будем выводить сообщения об успешности добавления комментария -->
	@endif
@endif
