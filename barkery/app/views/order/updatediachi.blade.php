@extends('layouts.master')
@section('content')
<title>Check out</title>
<div id="sanpham">
	<div id="hinhanhsanpham">
		<img src="{{$cake->image}}" class ="avatarsanpham" />
	</div>
	<div id="noidungsanpham">
	<center><strong>{{$cake->name}}</strong></center>
	<strong>Type</strong> : {{$cake->types}}</br>
	<strong>Price :</strong>{{$cake->price}}</br>	
	<strong>Description: </strong><p>{{$cake->review}}</p>
	@if ( Auth::check())
		<center><h1>ORDER</h1></center>	
		{{Form::open(array('url'=>'/order/ubasket/paydone', 'method' =>'get'))}}
		<p>Order :{{Form::select('id',array($order->id => $order->id))}}</p>
		<h3>Size : {{$order->sizes}}</h3>
		<h3>{{Form::label('info','Details')}}</h3>
		{{Form::text('info','None ?',array('style' => 'width:450px;'))}}
		<h3>Color : {{$order->color}}</h3>
		<h3>Số lượng : {{$order->soluong}}</h3>
		<h3>{{Form::label('diachi','Shipping address')}}</h3>
		{{Form::text('diachi',Input::old('diachi'),array('style'=>"width:450px;"))."</br>".$errors->first('diachi', '<span class="error">:message</span>')}}
		<h3>{{Form::submit('Check out')}}</h3>
		{{Form::close()}}
	@else
		<a href="/user/login">You must log in to order</a>		
	@endif
	</div>
</div>
@stop