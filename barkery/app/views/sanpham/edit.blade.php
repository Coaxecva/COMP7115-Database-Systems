@extends('layouts.master')
@section('content')
<title>Edit{{$cake->name}}</title>
{{Form::open(array('url'=>'admin/edit-sanpham/save', 'method' =>'post' , 'files' => true))}}
<div id="sanpham">
	<div id="hinhanhsanpham">
		<img src="{{$cake->image}}" class ="avatarsanpham" />
		<p>Photo</p>
		<center>{{Form::file('image')}}</center>
	</div>
	<div id="noidungsanpham">
	<center><strong>{{Form::text('name',$cake->name)}}</strong></center>
	<center><strong>Stt : {{Form::select('id',array($cake->id => $cake->id))}}</strong></center>
	<strong>Type</strong> : {{Form::select('types',array('CK' => 'Cheeses cake' ,'TI' => 'Tiramisu' , 'CH' => 'Chiffon' ,'BR' => 'Brownie'))}}</br>
	<strong>Size</strong> : {{Form::select('sizes',array('L' => 'Large' ,'M' => 'Medium' , 'MN' => 'Mini'))}}</br>
	<strong>Event</strong> : {{Form::select('event',array('AV'=>'Casual' , 'SN' =>'Birthday' , 'DC'=>'Wedding'))}}</br>
	<strong>Price :</strong>{{Form::text('price',$cake->price)}}</br>	
	<strong>Decription: </strong><p>{{Form::textarea('review',$cake->review)}}</p>
	{{Form::submit('Save')}}
	{{Form::close()}}
	<a href= "/sanpham/{{$cake->id}}">BACK</a>
	</div>
</div>
@stop