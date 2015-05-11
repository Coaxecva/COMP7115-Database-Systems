@extends('layouts.master')
@section('content')
<title>Đăng Ký</title>
<div id = "form_register">
	<?php 
		echo Form::open(array('url'=>'/user/register_result', 'method' =>'post'))
		."<table>"
		."<tr>"
		."<td>"
		.Form::label('fullname','full name')
		."</td>"
		."<td>"
		.Form::text('fullname',Input::old('fullname'))
		."<td>".$errors->first('fullname','<span class="error">:message</span>')."</td>" 
		."</td>"
		."</tr>"
		// look difference
		."<tr>"
		."<td>"
		.Form::label('username','username')
		."</td>"
		."<td>"
		.Form::text('username',Input::old('username'))
		."<td>". $errors->first('username', '<span class="error">:message</span>') ."</td>"
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::label('password','password')
		."</td>"
		."<td>"
		.Form::password('password')
		."<td>".$errors->first('password', '<span class="error">:message</span>')."</td>"
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::label('password_confirmation','password confirm')
		."</td>"
		."<td>"
		// like if you have : my_password, you need : my_password_confirmation ok ?
		.Form::password('password_confirmation')
		
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::label('email','Email')
		."</td>"
		."<td>"
		.Form::text('email',Input::old('email'))
		."<td>".$errors->first('email', '<span class="error">:message</span>')."</td>"
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::label('date','date Birth')
		."</td>"
		."<td>"
		.Form::text('day',Input::old('day'),array('class'=>"testbirth"))
		.Form::text('month',Input::old('month'),array('class'=>"testbirth"))
		.Form::text('year',Input::old('year'),array('class'=>"testbirth"))
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.$errors->first('day', '<span class="error">:message</span>')
		."</td>"
		."<td>"
		.$errors->first('month', '<span class="error">:message</span>')
		."</td>"
		."<td>"
		.$errors->first('year', '<span class="error">:message</span>')
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::label('sex','Giới tính')
		."</td>"
		."<td>"
		.Form::select('sex',array('male'=>'male','female'=>'female'))
		."</td>"
		."</tr>"
		//
		."<tr>"
		."<td>"
		.Form::submit('Register')
		."</td>"
		."<td>"
		.Form::captcha(array('theme'=>'blackglass'))
		."</td>"
		."</tr>"
		//
		//
		.Form::token()
		."</table>"
		.Form::close();
	?>
</div>
@stop