@extends('layouts.master')
@section('content')
<title>Update</title>
{{Form::open(array('url'=>'admin/update/save', 'method' =>'post' , 'files' => true))}}
<div id="sanpham">
	<div id="hinhanhsanpham">
		<center><h1>Photo</h1></center>
		<center>{{Form::file('image')}}</center>
	</div>
	<div id="noidungsanpham">
	<table>
	<tr>
		<th><strong>Name :</strong></th><td>{{Form::text('name')}}</td>
		<td>{{$errors->first('name', '<span class="error">:message</span>')}}</td>
	</tr>
	<tr>
		<td><strong>Type</strong></td><td>{{Form::select('types',array('CK' => 'Cheeses cake' ,'TI' => 'Tiramisu' , 'CH' => 'Chiffon' ,'BR' => 'Brownie'))}}</td>
	</tr>
	<tr>
		<td>
		<strong>Size</strong> : {{Form::select('sizes',array('L' => 'Large' ,'M' => 'Medium' , 'MN' => 'Mini'))}}</br>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Type</strong> : {{Form::select('event',array('AV'=>'Casual' , 'SN' =>'Birthday' , 'DC'=>'Wedding'))}}</br>
		</td>
	</tr>
	<tr>
		<td><strong>Price:</strong></td><td>{{Form::text('price')}}</td>
	</tr>
	</table>	
	<strong>Description: </strong>{{Form::textarea('review')}}
	</br>
	{{Form::submit('Update')}}
	{{Form::close()}}
	</div>
</div>
@stop