@extends('layouts.master')
@section('content')
<title>Add to cart</title>
<div id="sanpham">
	<div id="hinhanhsanpham">
		<img src="{{$cake->image}}" class ="avatarsanpham" />
	</div>
	<div id="noidungsanpham">
	<center><strong>{{$cake->name}}</strong></center>
	<strong>Type</strong> : {{$cake->types}}</br>
	<strong>Price :</strong>{{$cake->price}}</br>	
	<strong>Descrtiption: </strong><p>{{$cake->review}}</p>
	@if ( Auth::check())
		<center><h1>Add TO CART</h1></center>	
		{{Form::open(array('url'=>'/skiptocart/store', 'method' =>'get'))}}
		<p>Product :{{Form::select('id',array($cake->id => $cake->id))}}</p>
		<h3>{{Form::label('size','Size')}} {{Form::select('size',array('default'=>'choose size','6inch'=>'6inch 30$' , '9inch' => '9inch 50$' , '12inch' => ' 12inch 100$'))}}</h3>
		<h3>{{Form::label('info','Details')}}</h3>
		{{Form::text('info','None ?',array('style' => 'width:450px;'))}}
		<h3>{{Form::label('color','Color:')}} {{Form::select('color',array('default'=>'choose color','black'=>'chocolate black' , 'white' => 'white vani'))}}</h3>
		<h3>{{Form::label('quantity','QTL :')}}{{Form::text('quantity',Input::old('quantity'),array('style'=>"width:20px;")).$errors->first('quantity', '<span class="error">:message</span>')}}</h3>
		<h3>{{Form::submit('Add to cart')}}</h3>
		{{Form::close()}}
	@else
		<a href="/user/login">You must log in to order</a>		
	@endif
	</div>
</div>
@stop