@extends('layouts.master')
@section('content')
<title>Profile : List user</title>
<center>
	<table>
	@foreach ( $list as $lists)
	<tr>
		<th>Fullname : {{$lists->fullname}}</th>
		<th>username : {{$lists->username}}</th>
		<th>email : {{$lists->email}}</th>
		<th>Phân Quyền : {{$lists->id_role}}</th>
	</tr>
	<tr>
		<td><a href="/admin/delete/{{$lists->id}}">Xóa</a>
		</td>
		<td><a href="/admin/edit/{{$lists->id}}">Edit</a>
		</td>
		<td>
			{{Form::open(array('url'=>'/admin/edit/leveluser', 'method' =>'post'))}}
			{{Form::select('id',array($lists->id => $lists->id))}}
			{{Form::select('level',array('MB' => 'Member' , 'ADM' => 'Admin'))}}
			{{Form::submit('Phân Quyền')}}
			{{Form::close()}}
		</td>
	</tr>
	@endforeach
	<div class="dynamitmenu">
		{{$list->links()}}
	</div>
	</table>
</center>
@stop