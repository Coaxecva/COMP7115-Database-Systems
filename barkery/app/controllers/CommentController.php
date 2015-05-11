<?php

class CommentController extends \BaseController {
	protected  $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function input()
	{
		$id_comment = Input::get('id_comment');
		$comment = Input::get('comment');
		if(Auth::check())
		{
			$name = Auth::user()->username;
		}
		else 
		{
			$name = Input::get('username');
			$my_rules_manga_otaku  =array(
				'username' => array('required','min:4','max:16'),
				'comment' => array('required'),
			);
				$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
			
			if ($validation->fails()) 
		    {
		        // Validation has failed. 
		        return Redirect::to('/sanpham/'.$id_comment)->withInput()->withErrors($validation);
		    }
		}
		$id = DB::table('comment')->insertGetId
		(
			array('username'=>$name, 'comment'=>$comment , 'id_comment'=>$id_comment)
		);
		$this->layout->content = View::make('comment.back',array('result'=>"Your comment was post sucess"));
	}
	public function delete($id)
	{
		$comment = DB::select('select * from comment where id=?', array($id));
		if(Auth::check())
		{
			if(Auth::user()->username == $comment[0]->username || Auth::user()->id_role == "ADM" )
			{
				DB::table('comment')
				->where('id',$id)
				->delete();
				$this->layout->content = View::make('comment.back',array('result'=>"delete comment was sucess"));
			}
			else 
			{
				$this->layout->content = View::make('comment.back',array('result'=>"you cant delete this comment"));
			}
		}
	}
	public function edit($id)
	{
		$comment = DB::select('select * from comment where id=?', array($id));
		if(Auth::check())
		{
			if(Auth::user()->username == $comment[0]->username || Auth::user()->id_role == "ADM" )
			{
				$comment_edit = DB::select('select * from comment where id=?', array($id));
				$this->layout->content = View::make('comment.edit',array('comment_edit'=>$comment_edit[0]));
			}
			else 
			{
				$this->layout->content = View::make('comment.back',array('result'=>"you cant edit this comment"));
			}
		}
	}
	public function editsave()
	{
		$comment_edit = Input::get('save');
		$id = Input::get('id');
		DB::table('comment')
			->where('id',$id)
			->update(array('comment'=>$comment_edit));
		$this->layout->content = View::make('comment.back',array('result'=>"Edit done"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}