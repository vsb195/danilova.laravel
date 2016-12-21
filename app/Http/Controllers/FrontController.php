<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
	{
		$articles=Article::where('public','=',1)->get();
		return view('site/index',['articles'=>$articles]);
	}
	
	public function show($id)
	{
		$comments = Article::where('public', '=', 1)->find($id)->comments()->where('public', '=', '1')->get();
		$article = Article::where('public', '=', 1)->find($id);
		return view('site/show', ['article'=>$article, 'comments'=>$comments]);
	}
	
	public function category($id)
	{
		$articles=Article::where('category_id','=',$id)->get();
		return view('site/index',['articles'=>$articles]);
	}
	
	public function sendMail(Request $request, $id)
	{
		$all = $request->all();//Получаем все данные из формы в массив
			//return back()->with('message', "array=".json_encode($all));

		if(strlen($all['author']) < 2)
		{
			return back()->with('message', 'Поле "Имя" слишком короткое, ваше имя должно состоять минимум из 2 символов');
		}
        
		if(strlen($all['content']) < 2)
		{
			return back()->with('message', 'Ваше сообщение должно состоять минимум из 2 символов');
		}		
        $this->validate($request, [
            'author' => 'required|max:100|min:2',
            'email' => 'required|email',
            'content'=>'required|min:2|max:400'
        ]);
		
		// Сообщение
		$message = "From: ".$all['author']."\r\nContent: ". $all['content'];
		
		// Отправляем
		//mail('anutkadanilova@mail.ru', 'Форма обратной связи. Блог', $message);
		//
        return back()->with('message', 'Спасибо, ваше сообщение проверяют ФСБ. Ожидайте модерации. Мы с вами еще обязательно свяжется');
	}
}
