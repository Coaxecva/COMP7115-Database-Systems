@extends('layouts.master')
@section('content')
<title>Đăng nhập</title>
<div id = "form_login">
<?php 
	echo Form::open(array('url'=>'/user/loginattemp', 'method' =>'post'))
	.Form::label('username','username')
	.":".Form::text('username')
	."</br>"
	.Form::label('password','password')
	.":".Form::password('password')
	."</br>"
	.Form::submit('Log in')
	.Form::close();
?>
</div>
@stop