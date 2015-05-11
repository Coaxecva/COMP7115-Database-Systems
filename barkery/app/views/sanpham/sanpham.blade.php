@extends('layouts.master')
@section('content')
<title>{{$cake->name}}</title>
<div id="sanpham">
	<div id="hinhanhsanpham">
		<img src="{{$cake->image}}" class ="avatarsanpham" />
	</div>
	<div id="noidungsanpham">
	<center><strong>{{$cake->name}}</strong></center>
	<strong>Type</strong> : {{$cake->types}}</br>
	<strong>Size</strong> : {{$cake->sizes}}</br>
	<strong>Event</strong> : {{$cake->event}}</br>
	<strong>Price :</strong>{{$cake->price}}</br>	
	<strong>Description: </strong><p>{{$cake->review}}</p>
	@if ( Auth::check() && Auth::user()->id_role == "ADM")
		<a href="/admin/edit-sanpham/{{$cake->id}}"><img src="/images/icon/edit.ico" class="icon"/></a>
		<a href="/admin/delete-sanpham/{{$cake->id}}""><img src="/images/icon/delete.ico" class="icon"/></a>
	@else
		@if(AUth::check())
			<center><a href="/order/skiptocart/{{$cake->id}}"><img src="/images/icon/add_to_cart.ico"/></a></center>
		@endif
	@endif
	<strong>View : {{$cake->viewcounter}}</strong>
	</div>
</div>
<div id="comment">
	{{Form::open(array('url'=>'/comment', 'method' =>'get'))}}
	</br>
	@foreach ($comment as $comments)
	<div class="commentbox">
	<h3 class="username">{{$comments->username}} : </h3>
	<p>{{$comments->comment}}</p>
	@if(Auth::check())
		<a href="/delete-post/{{$comments->id}}""><img src="/images/icon/delete.ico" class="icon"/></a>
		<a href="/edit-post/{{$comments->id}}""><img src="/images/icon/edit.ico" class="icon"/></a>
	@endif
	</div>
	</br>
	@endforeach
	<div class=" dynamitmenu">
		{{$comment->links()}}
	</div>
	{{"Product ".Form::select('id_comment',array($cake->id => $cake->id))}}
	@if(Auth::check())
		{{Auth::user()->username}}
		</br>
		{{$errors->first('comment','<span class="error">:message</span>')}}</br>
		{{Form::textarea('comment')}}
	@else
		{{Form::label('username','username')}}
		{{Form::text('username')}}{{$errors->first('username','<span class="error">:message</span>')}}
		</br>
		{{$errors->first('comment','<span class="error">:message</span>')}}</br>
		{{Form::textarea('comment')}}
	@endif	
	{{Form::submit('Send')}}
	{{Form::close()}}
</div>
@stop