@extends('layouts.master')
@section('content')
<title>Chỉnh sửa tài khoản</title>
<title> Edit Profile : {{$profile->username}}</title>
<center>
	{{Form::open(array('url'=>'/user/edit/save', 'method' =>'post'))}}
	<table>
	<tr>
		<th>Fullname : {{Form::text('fullname',$profile->fullname).$errors->first('fullname', '<span class="error">:message</span>')}}</th>
	</tr>
	<tr>
		<th>Username : {{$profile->username}}</th>
	</tr>
	<tr>
		<th>Password : <a href="/user/edit/change_password/{{$profile->id}}">Change password</a></th>
	</tr>
	<tr>
		<th>Email : {{Form::text('email',$profile->email).$errors->first('email', '<span class="error">:message</span>')}}</th>
	</tr>
	</table>
	{{Form::select('id',array($profile->id => $profile->id))}}
	{{Form::submit('Save')}}
	{{Form::close()}}
</center>
@stop