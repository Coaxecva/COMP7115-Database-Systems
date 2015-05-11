@extends('layouts.master')
@section('content')
<title>Kết quả tìm kiếm</title>
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
		{{Form::label('price','Giá từ')}}
		{{Form::select('min',array('14000'=>'14000','20000'=>'20000', '25000'=>'25000','30000'=>'30000'))}}-
		{{Form::select('max',array('50000'=>'50000','60000'=>'60000', '70000'=>'70000','100000'=>'100000'))}}</br>
		{{Form::label('types','Loại')}}
		{{Form::select('types',array(''=>'Loại Bánh','CK'=>'Cheese cake','TI'=>'tiramisu', 'CH'=>'Chiffon','BR'=>'Brownie'))}}</br>
		{{Form::label('size','Cỡ bánh')}}
		{{Form::select('size',array('L'=>'To','M'=>'Vừa','MN'=>'Nhỏ'))}}</br>
		{{Form::label('event','Dành cho dịp')}}
		{{Form::select('event',array(''=>'Dịp','SN'=>'Sinh nhật','DC'=>'Đám cưới', 'AV' =>'Ăn vặt'))}}</br>
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
				<strong>Giá : {{$cake->price}}</strong>
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
					<div class="desc"></div><a href = "admin/update">Thêm sản phẩm...</a></div>
				</div>
			@endif
		@endif
	</div>
</div>
@stop