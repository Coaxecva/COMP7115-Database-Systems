@extends('layouts.master')
@section('content')
<title>Complete</title>
<div class="menu">
	<div class="menuleft">
		<strong>List</strong>
		<ul>
			<li><a href="/order/ubasket"><p>Total</p></a></li>
			<li><a href="/order/ubasket/bought"><p>Complete</p></a></li>
			<li><a href="/order/ubasket/buying"><p>Cart</p></a></li>
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
	</br>
	<center>
	<table border = "1">
		@foreach($list as $lists)
				<tr>
					<th>Cake</th>
					<td>Size</td>
					<td>Color</td>
					<td>QTL</td>
					<td>Status</td>
					<td>Total</td>
				</tr>
				<tr>
					<th>{{$lists->banhmuonmua}}</th>
					<td>{{$lists->sizes}}</td>
					<td>{{$lists->color}}</td>
					<td>{{$lists->soluong}}</td>
					<td>{{$lists->status}}</td>
					<td>{{$lists->thanhtien}}</td>
				</tr>
				<tr>
					<th colspan="6">Comment :{{$lists->noidungyeucau}}</th>
				</tr>
		@endforeach
		<tr><th colspan="6">Total : {{$total}}</th></tr>
		<divclass="dynamitmenu">
			{{$list->links()}}
		</div>
	</table>
	</center>
	</br>
	</div>
</div>
@stop