@extends('layouts.master')
@section('content')
<title>Thay đổi mật khẩu</title>
<title> Edit Profile : {{$profile->username}}</title>
<center>
	{{Form::open(array('url'=>'/user/edit/savepass', 'method' =>'post'))}}
	<table>
	<tr>
		<th>{{Form::label('password','password')}}</th>
		<td>{{Form::password('password')}}</td>	
		<td>{{$errors->first('password', '<span class="error">:message</span>')}}</td>
	</tr>
	<tr>
		<td>{{Form::label('password_confirmation','password confirm')}}</td>
		<td>{{Form::password('password_confirmation')}}</td>
	</tr>
	<tr>	
		<th>{{Form::label('oldpassword','oldpassword')}}</th>
		<td>{{Form::password('oldpassword')}}</td>
		<td>{{$errors->first('oldpassword', '<span class="error">:message</span>')}}</td>
	</tr>
	</table>
	{{Form::select('id',array($profile->id => $profile->id))}}
	{{Form::submit('Save')}}
	{{Form::close()}}
</center>
@stop