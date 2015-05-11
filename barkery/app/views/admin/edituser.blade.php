@extends('layouts.master')
@section('content')
<title> Edit user</title>
<center>
	{{Form::open(array('url'=>'/admin/edit/save', 'method' =>'post'))}}
	<table>
	<tr>
		<th>ID : {{Form::select('id',array($profile->id => $profile->id))}}</th>
	</tr>
	<tr>
		<th>Fullname : {{Form::text('fullname',$profile->fullname)}}</th>
	</tr>
	<tr>
		<th>date birth : {{Form::text('datebirth',$profile->datebirth)}}</th>
	</tr>
	<tr>
		<th>Username : {{Form::text('username',$profile->username)}}</th>
	</tr>
	<tr>
		<th>Password : {{Form::text('password','********')}}</th>
	</tr>
	<tr>
		<th>Email : {{Form::text('email',$profile->email)}}</th>
	</tr>
	<tr><th>{{Form::submit('save')}}</th></tr>
	</table>
	{{Form::close()}}
</center>
@stop