<?php

class orderController extends \BaseController {
	protected  $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$results = DB::select('select * from sanpham ');
		$results = DB::table ('sanpham')
					->paginate(6);
		$this->layout->content = View::make('order.index',array('list'=>$results));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function ordersanpham($id)
	{
		$results = DB::select('select * from sanpham where id=?' , array($id));
		$this->layout->content = View::make('order.sanpham',array('cake'=>$results[0]));
	}
	//
	public function payment ()
	{
		if(Auth::check())
		{
			$idsanpham = Input::get('id');
			$my_rules_manga_otaku  =array(
				'diachi' => array('required','min:7','max:50'), 
				'quantity' 	   => array('required','numeric','between:1,100'),
			);
				$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
			
			if ($validation->fails()) 
		    {
		        // Validation has failed. 
		        return Redirect::to("/order/sanpham/".$idsanpham)->withInput()->withErrors($validation);
		    }
			$username = Auth::user()->username;
			$diachi = Input::get('diachi');
			$yeucau = Input::get('info');
			$size = Input::get('size');
			$soluong = Input::get('quantity');
			$color = Input::get('color');
			if($size == "6inch")
			{
				$money = $soluong*30000 ;
			}
			else 
			{
				if($size == "9inch")
					$money = $soluong*50000;
				else 
				{
					if($size == "12inch")
						$money = $soluong*100000;
					else 
						$money = $soluong*25000;
				}
			}
			$results = DB::select('select * from sanpham where id=?' , array($idsanpham));
			$id = DB::table('payment')->insertGetId
			(
				array('username'=>$username ,'banhmuonmua'=> $results[0]->name ,'sizes'=>$size , 'diachi'=> $diachi , 'noidungyeucau'=>$yeucau , 'color'=>$color ,'soluong'=> $soluong , 'thanhtien'=>$money , 'status'=>"BOUGHT")
			);
			$doanhso = $soluong + $results[0]->soluongbanra;
			DB::table('sanpham')
					->where('id',$idsanpham)
					->update(array('soluongbanra'=>$doanhso));
			$this->layout->content = View::make('order.complete');
		}
		else 
		{
			$this->layout->content = Redirect::intended('/user/login');
		}
	}
	public function create()
	{
		//
	}
	public function skiptocart ($idsanpham)
	{
			$results = DB::select('select * from sanpham where id=?' , array($idsanpham));
			$this->layout->content = View::make('order.skiptocart',array('cake'=>$results[0]));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$idsanpham = Input::get('id');
		if(Auth::check())
			{
				$my_rules_manga_otaku  =array( 
					'quantity' 	   => array('required','numeric','between:1,100'),
				);
					$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
				
				if ($validation->fails()) 
			    {
			        // Validation has failed. 
			        return Redirect::to("/order/skiptocart/".$idsanpham)->withInput()->withErrors($validation);
			    }
			}
			$results = DB::select('select * from sanpham where id=?' , array($idsanpham));
			$soluong = Input::get('quantity');
			$username = Auth::user()->username;
			$size = Input::get('size');
			$yeucau = Input::get('info');
			$color = Input::get('color');
			if($size == "6inch")
			{
				$money = $soluong*30000 ;
			}
			else 
			{
				if($size == "9inch")
					$money = $soluong*50000;
				else 
				{
					if($size == "12inch")
						$money = $soluong*100000;
					else 
						$money = $soluong*25000;
				}
			}
				$id = DB::table('payment')->insertGetId
				(
					array('username'=>$username ,'banhmuonmua'=> $results[0]->name ,'sizes'=>$size, 'noidungyeucau'=>$yeucau , 'color'=>$color ,'soluong'=> $soluong , 'thanhtien'=>$money , 'status'=>"BUYING")
				);
			$this->layout->content = View::make('order.store');
	}
	//
	public function yourbasket ()
	{
		if(Auth::check())
		{
			$username = Auth::user()->username;
			//$results = DB::select(" select *  FROM payment WHERE username = '$username' ");
			$results = DB::table('payment')
						->where('username',$username)
						->paginate(3);
			$total = DB::table("payment")
					->where('username',$username)
					->sum('thanhtien');
			$this->layout->content = View::make('order.ubasket',array('list'=>$results,'total'=>$total));
		}
	}
	public function bought ()
	{
		if(Auth::check())
		{
			$username = Auth::user()->username;
			//$results = DB::select(" select *  FROM payment WHERE username = '$username' AND status = 'BOUGHT' ");
			$results = DB::table ('payment')
						->where('username',$username)
						->where('status','BOUGHT')
						->paginate(3);
			$total = DB::table("payment")
					->where('username',$username)
					->where('status',"BOUGHT")
					->sum('thanhtien');
			$this->layout->content = View::make('order.ubasket',array('list'=>$results,'total'=>$total));
		}
	}
	public function buying ()
	{
		if(Auth::check())
		{
			$username = Auth::user()->username;
			//$results = DB::select(" select *  FROM payment WHERE username = '$username' AND status = 'BUYING' ");
			$results = DB::table ('payment')
						->where('username',$username)
						->where('status','BUYING')
						->paginate(3);
			$total = DB::table("payment")
					->where('username',$username)
					->where('status',"BUYING")
					->sum('thanhtien');
			$this->layout->content = View::make('order.ubasketbuying',array('list'=>$results,'total'=>$total));
		}
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
		if(Auth::check())
		{
			DB::table('payment')
			->where('id',$id)
			->delete();
			$this->layout->content = View::make('comment.back',array('result'=>"Sản phẩm đã được bỏ"));
		}
	}
	public function paybuying($id)
	{
		if(Auth::check())
		{

			$order = DB::select('select * from payment where id=?' , array($id));
			$name = $order[0]->banhmuonmua;
			$results = DB::select("select * from sanpham where name = '$name'");
			$this->layout->content = View::make('order.updatediachi',array('cake'=>$results[0],'order'=>$order[0]));
		}
	}
	public function paybuyingdone ()
	{
		if(Auth::check())
		{
			$id = Input::get('id');
			$my_rules_manga_otaku  =array(
					'diachi' => array('required','min:7','max:50'), 
				);
					$validation = Validator::make(Input::all(), $my_rules_manga_otaku);  
				
				if ($validation->fails()) 
			    {
			        // Validation has failed. 
			        return Redirect::to("/order/ubasket/pay/".$id)->withInput()->withErrors($validation);
			    }
			$info = Input::get('info');
			$diachi = Input::get('diachi');
			DB::table('payment')
						->where('id',$id)
						->update(array('diachi'=>$diachi,'status'=>"BOUGHT",'noidungyeucau'=>$info));
			$this->layout->content = View::make('order.complete');
		}
	}

}