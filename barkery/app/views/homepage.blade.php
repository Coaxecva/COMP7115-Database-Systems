@extends('layouts.master')
@section('content')
<title>Bakery Website</title>
<div id="homepage">
<div id = "slider">
			<section id="jms-slideshow" class="jms-slideshow">
				<div class="step" data-color="color-2">
					<div class="jms-content">
						<h3>Just when I thought...</h3>
					<p>From fairest creatures we desire increase, that thereby beauty's rose might never die</p>
						<a class="jms-link" href="#">Read more</a>
					</div>
					<img src="/images/slide/1.jpg" width = 450px; />
				</div>
				<div class="step" data-color="color-3">
					<div class="jms-content">
						<h3>Holy cannoli!</h3>
					<p>But as the riper should by time decease, his tender heir might bear his memory</p>
						<a class="jms-link" href="#">Read more</a>
					</div>
					<img src="/images/slide/2.jpg" width = 450px; />
				</div>
				<div class="step" data-color="color-4" >
					<div class="jms-content">
						<h3>No time to waste</h3>
					<p>Within thine own bud buriest thy content and, tender churl, makest waste in niggarding</p>
						<a class="jms-link" href="#">Read more</a>
					</div>
					<div class ="slide_pic">
						<img src="/images/slide/3.jpg" width = 450px; />
					</div>
				</div>
				<div class="step" data-color="color-5">
					<div class="jms-content">
						<h3>Supercool!</h3>
					<p>Making a famine where abundance lies, thyself thy foe, to thy sweet self too cruel</p>
						<a class="jms-link" href="#">Read more</a>
					</div>
					<img src="/images/slide/4.jpg" width = 450px; />
				</div>
			</section>
<div id= "new">
	<div id="newleft">
		<div id="new1">
			<a href="/event/AV"><img src="/images/snackcake.jpg" width = 400px , height = 150px ></a>
		</div>
		<div id="new2">
			<a href="/event/SN"><img src="/images/birthdaycake.jpg" width  = 400px , height = 150px ></a>
		</div>
	</div>
	<div id="newright">
			<a href="/event/DC"><img src="/images/weddingcake.jpg" width = 300px , height = 300px  ></a>
	</div>
</div>
</div>
<div id="order">
	<a href="/order"><img src="/images/order.jpg" /></a>
</div>
</div>
@stop