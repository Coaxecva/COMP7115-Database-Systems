@extends('layouts.master')
@section('content')
<title>Profile : {{$profile->username}}</title>
<center>
	<table>
	<tr>
		<th>Fullname : {{$profile->fullname}}</th>
	</tr>
	<tr>
		<th>Username : {{$profile->username}}</th>
	</tr>
	<tr>
		<th>Password : ********</th>
	</tr>
	<tr>
		<th>date birth : {{$profile->datebirth}}</th>
	</tr>
	<tr>
		<th>Giới tính : {{$profile->sex}}</th>
	</tr>
	<tr>
		<th>Email : {{$profile->email}}</th>
	</tr>
	<tr>
		<td><a href="/admin/listuser">List user</a>-
		<a href="/admin/historyshop">Lịch sử mua bán</a></td>
	</tr>
	</table>
</center>
@stop