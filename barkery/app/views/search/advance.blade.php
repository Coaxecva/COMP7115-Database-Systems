@extends('layouts.master')
@section('content')
<title>Advanced search</title>
<div class="menu">
	<div class="menuleft">
		<strong>Season Menu</strong>
		<ul>
			<li><p>Cakes</p></li>
			<li><p>Cupcakes</p></li>
			<li><p>Icebox Desserts & Pies</p></li>
		</ul>
		<div class="searchadvance">
		{{Form::open(array('url'=>'/search/advance', 'method' =>'get'))}}
		{{Form::label('price','From')}}
		{{Form::select('min',array('14'=>'14','20'=>'20', '25'=>'25','30'=>'30'))}}-
		{{Form::select('max',array('50'=>'50','60'=>'60', '70'=>'70','100'=>'100'))}}</br>
		{{Form::label('types','Type')}}
		{{Form::select('types',array(''=>'Type','CK'=>'Cheese cake','TI'=>'Tiramisu', 'CH'=>'Chiffon','BR'=>'Brownie'))}}</br>
		{{Form::label('size','Size')}}
		{{Form::select('size',array('L'=>'Large','M'=>'Medium','MN'=>'Small'))}}</br>
		{{Form::label('event','Event')}}
		{{Form::select('event',array(''=>'Event','SN'=>'Birthday','DC'=>'Wedding', 'AV' =>'Casual'))}}</br>
		{{Form::submit('search')}}
		{{Form::close()}}
		</div>
	</div>
	<div class="menuright">
		@foreach ($list as $cake)
		<div class="img">
			<a href="/sanpham/{{$cake->id}}" class="tooltip">
				<img src="{{$cake->image}}" class="sanpham" />
				
				<div class="desc">{{$cake->name}}</br>
				<strong>Price : {{$cake->price}}</strong>
				@if(Auth::check())
				<center><a href="/order/skiptocart/{{$cake->id}}"><p><img src="/images/icon/add_to_cart.ico"/></a></center>
				@endif
				</div>
			</a>
		</div>
		@endforeach
		<div class="dynamitmenu">
			{{$list->links()}}
		</div>
		@if ( Auth::check())
			@if(Auth::user()->id_role == "ADM")
				<div class="img">
					<div class="desc"></div><a href = "admin/update">Add...</a></div>
				</div>
			@endif
		@endif
	</div>
</div>
@stop