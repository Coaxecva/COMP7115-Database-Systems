<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/default/body.css" />
	 <link rel="stylesheet" type="text/css" href="/default/style.css" />
	<link rel="stylesheet" href="/default/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script type="text/javascript" src="/js/jmpress.min.js"></script>
	<!-- jmslideshow plugin : extends the jmpress plugin -->
	<script type="text/javascript" src="/js/jquery.jmslideshow.js"></script>
	<script type="text/javascript" src="/js/modernizr.custom.48780.js"></script>
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script>
	        tinymce.init({selector:'textarea'});
	</script>
	<noscript>
			<style>
			.step {
				width: 100%;
				position: relative;
			}
			.step:not(.active) {
				opacity: 1;
				filter: alpha(opacity=99);
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=99)";
			}
			.step:not(.active) a.jms-link{
				opacity: 1;
				margin-top: 40px;
			}
			</style>
	</noscript>
</head>
<body>
	<div id = "wrap">
		<div id="baner">
			<div id="baner_left">
				
			</div>
			<div id = "baner_right">
				<ul class="menuul">
					<li class="menu">
						@if (Auth::check())
						<strong><?php echo Auth::user()->username ?></strong>
							@if(Auth::user()->id_role == "ADM")
								<a href="/admin/profile"><strong font color = "red">Admin user</strong></a>
								<a href = "/order/ubasket">[ Cart ]</a>
							@else
								<a href = "/user/profile">[ Profile ]</a>
								<a href = "/order/ubasket">[ Cart ]</a>
							@endif
							<a href = "/user/logout">Log Out</a>
						@else
						  	<a href="/user/login">Login</a>
						  	<a href="/user/register">Register</a>
						@endif
					</li>
					<li class="menu right_">
						<?php
							echo Form::open(array('url'=>'result', 'method' =>'get', 'class'=>'menu'))
							.Form::text('search','search here')
							.Form::submit('search')
							.form::close();
						?>
					</li>
				</ul>
			</div>
		</div>
		<div id = "menu">
			<div id="menulogo">
				<a href="/"><img src="/images/logo.png" height = "70" , width = "200"></a>
			</div>
			<div id="menucenter">
			<ul id="menu2">
			    <li><a href="/sanpham"><strong>Products</strong></a>
			
			        <ul class="sub-menu">
			            <li>
			                <a href="/cheesecake">Cheese Cake</a>
			            </li>
			            <li>
			                <a href="/tiramisu">Tiramisu</a>
			            </li>
			            <li>
			                <a href="/chiffon">Chiffon Cake</a>
			            </li>
			            <li>
			                <a href="/brownie">Brownie</a>
			            </li>
			            <li>
			                <a href="#">Panettone</a>
			            </li>
			        </ul>
			    </li>
			    <li><a href="#"><strong>Gallery</strong></a>
			
			    </li>
			    <li><a href="#"><strong>About</strong></a>
			
			        <ul class="sub-menu">
			            <li>
			                <a href="/about/instroduce">Intro</a>
			            </li>
			            <li>
			                <a href="/about/contact">Contact</a>
			            </li>
			        </ul>
			    </li>
			    <li>
			        <a href="/order"><strong>Order</strong></a>
			    </li>
			</ul>
			</div>
		</div>
		@yield('content')
		
		<div id ="foot">
		<p>U of Memphis Fall 2014</p>
		</div> 
	</div>
	<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/js/slide.js"></script>
	<script type="text/javascript">
			$(function() {
				
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				$( '#jms-slideshow' ).jmslideshow( $.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: false
				}));
				
			});
	</script>
</body>
</html>