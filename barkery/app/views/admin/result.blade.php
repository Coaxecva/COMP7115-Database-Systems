@extends('layouts.master')
@section('content')
<title>result</title>
<center>
	<a href= "{{URL::previous()}}">{{$result}}</a>
</center>
@stop