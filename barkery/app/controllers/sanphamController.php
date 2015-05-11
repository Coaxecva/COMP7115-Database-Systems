<?php

class sanphamController extends \BaseController {
	protected  $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$results = DB::select('select * from sanpham ');
		$results = DB::table('sanpham')->paginate(6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public  function event ($event)
	{
		$results = DB::table('sanpham')->where('event',$event)->paginate(6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
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
		$results = DB::select('select * from sanpham where id=?' , array($id));
		$viewcounter = $results[0]->viewcounter+1;
		//$comment = DB::select('select * from comment where id_comment=?', array($id));
		DB::table('sanpham')
						->where('id',$id)
						->update(array('viewcounter'=>$viewcounter ));
		$comment = DB::table('comment')
					->where('id_comment',$id)
					->paginate(4);
		$this->layout->content = View::make('sanpham.sanpham',array('cake'=>$results[0],'comment'=>$comment));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function cheesecake ()
	{
		//$results = DB::select("select * from sanpham where types = 'CK' ");
		$results = DB::table('sanpham')
					->where ('types','CK')
					->paginate(6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
	}
	public  function  tiramisu ()
	{
		//$results = DB::select("select * from sanpham where types = 'TI' ");
		$results = DB::table('sanpham')
					->where ('types','TI')
					->paginate(6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
	}
	public  function  chiffon ()
	{
		//$results = DB::select("select * from sanpham where types = 'CH' ");
		$results = DB::table('sanpham')
					->where('types','CH')
					->paginate (6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
	}
	public  function  brownie ()
	{
		//$results = DB::select("select * from sanpham where types = 'BR' ");
		$results = DB::table ('sanpham')
					->where('types','BR')
					->paginate (6);
		$this->layout->content = View::make('sanpham.index',array('list'=>$results));
	}
	public function edit($id)
	{
		if(Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$results = DB::select('select * from sanpham where id=?' , array($id));
				$this->layout->content = View::make('sanpham.edit',array('cake'=>$results[0]));
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
	public function  editform ()
	{
		$name = Input::get('name');
		$types = Input::get('types');
		$price = Input::get('price');
		$review = Input::get('review');
		$sizes = Input::get('sizes');
		$event = Input::get('event');
		$id = Input::get('id');
		$image = Input::file('image'); 
		$destinationPath = 'images/cake/';
		if($image != NULL)
		{
			$filename = $image->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
			$uploadSuccess = Input::file('image')->move($destinationPath, $filename);
			if(Input::has('name') && Input::has('price') && Input::has('review'))
			{
				DB::table('sanpham')
					->where('id',$id)
					->update(array('event'=>$event,'sizes'=>$sizes,'name'=>$name,'price'=>$price, 'types'=>$types , 'review'=> $review ,'image'=> '/'.$destinationPath.$filename ));
			}
			else 
				$this->layout->content = View::make('comment.back',array('result'=>'Edit some error'));
			if( $uploadSuccess ) {
				$this->layout->content = View::make('comment.back',array('result'=>'Edit was complete'));
			}
			else
			{
				$this->layout->content = View::make('comment.back',array('result'=>'Edit some error'));
			}
		}
		else 
		{
			if(Input::has('name') && Input::has('price') && Input::has('review'))
				{
					DB::table('sanpham')
						->where('id',$id)
						->update(array('event'=>$event,'sizes'=>$sizes,'name'=>$name,'price'=>$price, 'types'=>$types , 'review'=> $review ));
					$this->layout->content = View::make('comment.back',array('result'=>'Edit was complete'));
				}
				else 
					$this->layout->content = View::make('comment.back',array('result'=>'Edit some error'));
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		if(Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{
				$this->layout->content = View::make('sanpham.update');
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
	public function updatesave ()
	{
		$image = Input::file('image'); 
		$name = Input::get('name');
		$types = Input::get('types');
		$price = Input::get('price');
		$review = Input::get('review');
		$event = Input::get('event');
		$sizes = Input::get('sizes');
		$destinationPath = 'images/cake/';
		$my_rules_manga_otaku  =array(
			'name' => array('required', 'unique:sanpham,name','min:4','max:16'),
		);
			$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
		
		if ($validation->fails()) 
	    {
	        // Validation has failed. 
	        return Redirect::to('admin/update')->withInput()->withErrors($validation);
	    }
		if(Input::has('name') && Input::has('price') && Input::has('review')&& $image != NULL)
		{
			$filename = $image->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
			$uploadSuccess = Input::file('image')->move($destinationPath, $filename);
			$id = DB::table('sanpham')->insertGetId
			(
				array( 'event'=>$event,'sizes'=>$sizes,'viewcounter'=>0,'types'=>$types,'name'=>$name , 'image'=> '/'.$destinationPath.$filename , 'price'=>$price ,'review'=>$review)
			);
			if( $uploadSuccess ) {
				$this->layout->content = View::make('comment.back',array('result'=>'Update was complete'));
			}
			else
			{
				$this->layout->content = View::make('comment.back',array('result'=>'Update some error from image'));
			}
		}
		else
		{
			$this->layout->content = View::make('comment.back',array('result'=>'Update some error '));
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Auth::check())
		{
			if(Auth::user()->id_role == "ADM")
			{	
				DB::table('sanpham')
				->where('id',$id)
				->delete();
				$this->layout->content = View::make('sanpham.delete');
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

}