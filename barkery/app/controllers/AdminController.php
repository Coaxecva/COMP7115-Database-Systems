<?php

class AdminController extends \BaseController {
	protected  $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function profile()
	{
		$id = Auth::user()->id;
		$result = DB::select("select * from users where id=?",array($id) );
		$this->layout->content = View::make('admin.profile',array('profile'=>$result[0]));
		
	}
	public function listuser()
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				//$result = DB::select("select * from users");
				$result = DB::table ('users')
							->paginate(4);
				$this->layout->content = View::make('admin.listuser',array('list'=>$result));
			}
			else 
			{
				return Redirect::to('/');
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function delete($id)
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				if (Auth::user()->id != $id)
				{
					DB::table('users')
					->where('id',$id)
					->delete();
					$this->layout->content = View::make('admin.result',array('result'=>"delete complete"));	
				}
				else 
				{
					$this->layout->content = View::make('admin.result',array('result'=>"you cant delete user loging"));
				}
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function edituser($id)
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$result = DB::select("select * from users where id=?",array($id) );
				$this->layout->content = View::make('admin.edituser',array('profile'=>$result[0]));
			}
			else 
			{
				return Redirect::to('/');
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function editsave()
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$id = Input::get('id');
				$fullname = Input::get('fullname');
				$username = Input::get('username');
				$password = Input::get('password');
				$datebirth = Input::get('datebirth');
				$email = Input::get('email');
				DB::table('users')
					->where('id',$id)
					->update(array('fullname'=>$fullname , 'username'=>$username , 'password'=>Hash::make($password), 'email'=>$email , 'datebirth'=>$datebirth));
				$this->layout->content = View::make('admin.result',array('result'=>"edit complete"));
			}
			else 
			{
				return Redirect::to('/');
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function editlevel ()
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$id = Input::get('id');
				$level = Input::get('level');
				DB::table('users')
					->where('id',$id)
					->update(array('id_role'=>$level));
				$this->layout->content = View::make('admin.result',array('result'=>"edit complete"));
			}
			else 
			{
				return Redirect::to('/');
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function history()
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$results = DB::table('payment')
								->paginate(3);
					$total = DB::table("payment")
							->sum('thanhtien');
					$this->layout->content = View::make('admin.history',array('list'=>$results,'total'=>$total));
			}
			else 
			{
				return Redirect::to('/');
			}
		}	
		else 
		{
			return Redirect::to('/');
		}
	}
	public function bought()
	{
		if (Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$results = DB::table('payment')
								->where('status','BOUGHT')
								->paginate(3);
					$total = DB::table("payment")
							->where('status','BOUGHT')
							->sum('thanhtien');
					$this->layout->content = View::make('admin.history',array('list'=>$results,'total'=>$total));
			}
			else 
			{
				return Redirect::to('/');
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
	public function historyorder($username)
	{
		if(Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$results = DB::table('payment')
							->where('username',$username)
							->where('status','BOUGHT')
							->paginate(3);
				$users = DB::table('users')
							->where('username',$username)
							->get();
				$total = DB::table("payment")
							->where('username',$username)
							->where('status','BOUGHT')
							->sum('thanhtien');
				$this->layout->content = View::make('admin.historyorder',array('list'=>$results,'total'=>$total , 'users'=>$users[0]));
			}
			else 
			{
				return Redirect::to('/');	
			}
		}
		else 
		{
			return Redirect::to('/');
		}
	}
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
	public function edit($id)
	{
		//
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