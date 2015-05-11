<?php

class UsersController extends \BaseController {
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
	public function  login ()
	{
		$this->layout->content = View::make('user.login');
	}
	public  function  login_attemp ()
	{
		if(Input::has('username') && Input::has('password'))
		{
			$user = Input::get('username');
			$pass = Input::get('password');
			
			if (Auth::attempt(array('username'=>$user , 'password'=>$pass )))
			{
			    return Redirect::intended('/');
			}
			else 
			{
				$this->layout->content = View::make('user.login',array('result'=>"Your password or username is not right"));
			}
		}
		else
		{
			return Redirect::intended('/');
		}
	}
	public function register()
	{
		$this->layout->content = View::make('user.register');
	}
	public function register_result()
	{
	$my_rules_manga_otaku  =array(
		'fullname' => array('alpha','min:7','max:16'),
		'username' => array('required', 'unique:users,username','min:7','max:16'),
        'email'    => array('required', 'email', 'unique:users,email'),
        'password' => array('required','confirmed','min:7','max:16'), 
		'day' 	   => array('numeric','between:1,31'),
		'month' 	   => array('numeric','between:1,12'),
		'year'	   => array('numeric','between:1990,2014'),
		'recaptcha_response_field'  => 'required|recaptcha',
	);
		$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
	
	if ($validation->fails()) 
    {
        // Validation has failed. 
        return Redirect::to('/user/register')->withInput()->withErrors($validation);
    }
    // Validation has succeeded. Create new user.	
	if(Input::has('username')&& Input::has('password') && Input::has('fullname') && Input::has('email'))
		{
			$username  = Input::get('username');
			$password  = Input::get('password');
			$password2 = Input::get('password_confirmation');
			$email = Input::get('email');
			$day = Input::get('day');
			$month = Input::get('month');
			$year = Input::get('year');
			$sex = Input::get('sex');
			if($password == $password2)
			{
				$password = Hash::make($password);
				$fullname = Input::get('fullname');
				$email = Input::get('email');
				$results = DB::select("select id from users where username = '$username'" );
				if($results == NULL)
				{
					$id = DB::table('users')->insertGetId
					(
						array('fullname'=>$fullname , 'username'=>$username , 'password'=>$password ,'email'=>$email,'datebirth'=>$day.'/'.$month.'/'.$year,'sex'=>$sex ,'id_role'=>"MB")
					);
					$this->layout->content = View::make('user.store',array('result'=>"Register success"));
				}
				else 
				{
					$this->layout->content = View::make('user.store',array('result'=>"This Account already have"));
				}
			}
			else 
			{
				$this->layout->content = View::make('user.store',array('result'=>"password confirm is not right"));
			}	
		}
		else 
		{
				$this->layout->content = View::make('user.store',array('result'=>"not complete register"));
		}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function profile()
	{
		$id = Auth::user()->id;
		$result = DB::select("select * from users where id=?",array($id) );
		$this->layout->content = View::make('user.profile',array('profile'=>$result[0]));
		
	}
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
	public function edit()
	{
		$id = Auth::user()->id;
		$result = DB::select("select * from users where id=?",array($id) );
		$this->layout->content = View::make('user.edit',array('profile'=>$result[0]));
	}
	public function editsave()
	{
		$my_rules_manga_otaku  =array(
			'fullname' => array('alpha', 'unique:users,fullname','min:7','max:16'),
	        'email'    => array('required', 'email', 'unique:users,email'),
		);
			$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
		
		if ($validation->fails()) 
	    {
	        // Validation has failed. 
	        return Redirect::to('/user/edit')->withInput()->withErrors($validation);
	    }
	    $id = Input::get('id');
		$fullname = Input::get('fullname');
		$email = Input::get('email');
		DB::table('users')
			->where('id',$id)
			->update(array('fullname'=>$fullname,'email'=>$email));
		$this->layout->content = View::make('user.store',array('result'=>"Edit Complete"));
	}
	public function changepass ($id)
	{
		$result = DB::select("select * from users where id=?",array($id) );
		$this->layout->content = View::make('user.changepass',array('profile'=>$result[0]));
	}
	public function savepass()
	{
		$id = Input::get('id');
		$my_rules_manga_otaku  =array(
	        'password' => array('required','confirmed','min:7','max:16'), 
			'oldpassword' => array('required','min:7','max:16'), 
		);
			$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
		
		if ($validation->fails()) 
	    {
	        // Validation has failed. 
	        return Redirect::to('/user/edit/change_password/'.$id)->withInput()->withErrors($validation);
	    }
	    $password = Hash::make (Input::get('password'));
	    $oldpassword = Input::get('oldpassword');
	    $username = Auth::user()->username;
	    if( Auth::attempt(array('username'=>$username , 'password' => $oldpassword)))
	    {
	    	DB::table('users')
			->where('id',$id)
			->update(array('password'=>$password));
			$this->layout->content = View::make('user.store',array('result'=>"Edit Complete"));
	    }
	    else
	    {
	    	$this->layout->content = View::make('comment.back',array('result'=>"password cũ không đúng"));
	    }
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