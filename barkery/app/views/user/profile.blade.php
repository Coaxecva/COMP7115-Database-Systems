@extends('layouts.master')
@section('content')
<title>Profile</title>
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
	</table>
	{{Form::open(array('url'=>'/user/edit', 'method' =>'get'))}}
	{{Form::select('id',array($profile->id => $profile->id))}}
	{{Form::submit('Edit profile')}}
	{{Form::close()}}
</center>
@stop