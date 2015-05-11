@extends('layouts.master')
@section('content')
<title>Order {{$cake->name}}</title>
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
		{{Form::open(array('url'=>'/order/payment', 'method' =>'get'))}}
		<p>Product :{{Form::select('id',array($cake->id => $cake->id))}}</p>
		<h3>{{Form::label('size','Size')}} {{Form::select('size',array('default'=>'choose size','6inch'=>'6inch 30$' , '9inch' => '9inch 50$' , '12inch' => ' 12inch 100$'))}}</h3>
		<h3>{{Form::label('info','Details')}}</h3>
		{{Form::text('info','None ?',array('style' => 'width:450px;'))}}
		<h3>{{Form::label('color','Color:')}} {{Form::select('color',array('default'=>'choose color','black'=>'chocolate black' , 'white' => 'white vani'))}}</h3>
		<h3>{{Form::label('quantity','QTL :')}}{{Form::text('quantity',Input::old('quantity'),array('style'=>"width:20px;")).$errors->first('quantity', '<span class="error">:message</span>')}}</h3>
		<h3>{{Form::label('diachi','Shipping address')}}</h3>
		{{Form::text('diachi',Input::old('diachi'),array('style'=>"width:450px;"))."</br>".$errors->first('diachi', '<span class="error">:message</span>')}}
		<h3>{{Form::submit('Thanh Toán')}}</h3>
		{{Form::close()}}
	@else
		<a href="/user/login">You must log in to order</a>		
	@endif
	</div>
</div>
@stop