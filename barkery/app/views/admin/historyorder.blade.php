@extends('layouts.master')
@section('content')
<div class="menu">
	<div class="menuleft">
			<strong>List mua bán của tài khoản :</strong><h4>{{$users->username}}</h4>
			<ul>
				<li><p>Thông tin :</p></li>
				<li><p>Tên : {{$users->fullname}}</p></li>
				<li><p>Email : {{$users->email}}</p></li>
				<li><p>Ngày sinh : {{$users->datebirth}}</p></li>
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
	</br>
	<center>
	<table border = "1">
		@foreach($list as $lists)
				<tr>
					<th>Tài khoản mua</th>
					<th>Bánh</th>
					<td>Size</td>
					<td>Màu chọn</td>
					<td>Số lượng đặt mua</td>
					<td>Tình trạng</td>
					<td>Tổng tiền</td>
				</tr>
				<tr>
					<th><a href="/admin/history/{{$lists->username}}">{{$lists->username}}</a></th>
					<th>{{$lists->banhmuonmua}}</th>
					<td>{{$lists->sizes}}</td>
					<td>{{$lists->color}}</td>
					<td>{{$lists->soluong}}</td>
					<td>{{$lists->status}}</td>
					<td>{{$lists->thanhtien}}</td>
				</tr>
				<tr>
					<th colspan="7">Nội dung yêu cầu :{{$lists->noidungyeucau}}</th>
				</tr>
				<tr>
					<th colspan="7">Địa chỉ muốn giao :{{$lists->diachi}}</th>
				</tr>
		@endforeach
		<tr><th colspan="7">Tổng cộng : {{$total}}</th></tr>
		<divclass="dynamitmenu">
			{{$list->links()}}
		</div>
	</table>
	</center>
	</br>
	</div>
</div>
@stop