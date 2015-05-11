@extends('layouts.master')
@section('content')
<title>Order list</title>
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
		{{Form::select('event',array(''=>'Event','SN'=>'Birthday','DC'=>'Wedding', 'AV' =>'Causual'))}}</br>
		{{Form::submit('search')}}
		{{Form::close()}}
		</div>
	</div>
	<div class="menuright">
		@foreach ($list as $cake)
		<div class="img">
			<a href="/order/sanpham/{{$cake->id}}" class="tooltip">
				<img src="{{$cake->image}}" class="sanpham" />
				
				<div class="desc">{{$cake->name}}</br>
				<strong>Price : {{$cake->price}}</strong>
				</div>
			</a>
		</div>
		@endforeach
		<div class="dynamitmenu">
			{{$list->links()}}
		</div>
	</div>
</div>
@stop