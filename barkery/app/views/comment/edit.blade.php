@extends('layouts.master')
@section('content')
<div id="comment">
	{{Form::open(array('url'=>'/edit/save', 'method' =>'get'))}}
	<p>Edit</p>
	{{Form::select('id',array($comment_edit->id => $comment_edit->id))}}
	{{Form::textarea('save',$comment_edit->comment)}}
	{{Form::submit('Save')}}
	{{Form::close()}}
	<a href= "/sanpham/{{$comment_edit->id_comment}}">BACK</a>
</div>
@stop