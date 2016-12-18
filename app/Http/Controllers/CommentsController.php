<?php

namespace App\Http\Controllers;
use App\Comments;
use Illuminate\Http\Request;

use App\Http\Requests;


class CommentsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only' => ['show']]); // посредник auth будет применен только для метода show
    }

	
    public function save(Request $request, $id)
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
        $all['article_id'] = $id;//Добавляем в массив id статьи
        Comments::create($all);//Сохраняем в базу
        return back()->with('message', 'Спасибо за комментарий. После проверки он будет опубликован');
    }
	
	public function show()
	{
		$comments = Comments::FullComments(); //вот здесь и пригодился static метод
		return view('admin.comments.show', ['comments'=>$comments]);
	}


	public function delete($id)
	{
		$comment=Comments::find($id);
		$comment->delete();
		return back();
	}
	
	public function published($id)
	{
		$comment = Comments::find($id);
		$comment->public = 1;
		$comment->save();
		return back();
	}


}
