<?php

class searchController extends \BaseController {
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
	public function search ()
	{
		$search = Input::get('search');
		//$results = DB::select("select * from sanpham where name LIKE '%$search%'");
		$results = DB::table('sanpham')
					->where('name','LIKE',"%$search%")
					->paginate(6);
		$this->layout->content = View::make('search.index',array('list'=>$results));
	}
	public function advance ()
	{
		$min = Input::get('min');
		$max = Input::get('max');
		$types = Input::get('types');
		$size = Input::get('size');
		$event = Input::get('event');
		if(Input::has('types'))
		{
			if(Input::has('event'))
			{
				/*$results = DB::select("select * from sanpham where 
										types  = '$types' AND 
										event  = '$event' AND 
										sizes = '$size'   AND
										price BETWEEN '$min' AND '$max' 
										 ");*/
				$results = DB::table ('sanpham')
							->where('types',$types)
							->where('event',$event)
							->where('sizes',$size)
							->where('price','>=',$min)
							->where('price','<=',$max)
							->paginate(6);
			}
			else 
			{
				/*$results = DB::select("select * from sanpham where 
										types  = '$types' AND 
										sizes = '$size'   AND
										price BETWEEN '$min' AND '$max' 
										 ");*/
				$results = DB::table('sanpham')
							->where('types',$types)
							->where('sizes',$size)
							->where('price','>=',$min)
							->where('price','<=',$max)
							->paginate(6);
			}
		}	
		else
		{ 
			if(Input::has('event'))
			{
				/*$results = DB::select("select * from sanpham where  
										event  = '$event' AND 
										sizes = '$size'   AND
										price BETWEEN '$min' AND '$max' 
										 ");*/
				$results = DB::table ('sanpham')
							->where('event',$event)
							->where('sizes',$size)
							->where('price','>=',$min)
							->where('price','<=',$max)
							->paginate(6);
			}
			else
			{
				/*$results = DB::select("select * from sanpham where  
										sizes = '$size'   AND
										price BETWEEN '$min' AND '$max' 
										 ");*/
				$results = DB::table ('sanpham')
							->where('sizes',$size)
							->where('price','>=',$min)
							->where('price','<=',$max)
							->paginate(6);
			}
		}	
		$this->layout->content = View::make('search.advance',array('list'=>$results));
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