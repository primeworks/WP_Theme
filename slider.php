<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Featured Content Slider</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />

	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="js/coda-slider.1.1.1.pack.js"></script>
	
	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>
</head>

<body>
	
	<div id="page-wrap">
											
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">

				<div class="panel" title="Panel 1">
					<div class="wrapper">
						<img src="images/tempphoto-1.jpg" alt="temp" />
						<div class="photo-meta-data">
							Photo Credit: <a href="http://flickr.com/photos/astrolondon/2396265240/">Kaustav Bhattacharya</a><br />
							<span>"Free Tibet" Protest at the Olympic Torch Rally</span>
						</div>
					</div>
				</div>
				<div class="panel" title="Panel 2">
					<div class="wrapper">
						<img src="images/tempphoto-2.jpg" alt="temp" />
						<div class="photo-meta-data">
							Chicago Bears at Seattle Seahawks<br />
							<span>Fifth field goal, overtime win for the Seahawks</span>
						</div>
					</div>
				</div>		
				
				<div class="panel" title="Panel 4">
					<div class="wrapper">
						<img src="images/tempphoto-4.jpg" alt="temp" />
						<div class="photo-meta-data">
							A Poem by Shel Silverstein<br />
							<span>Falling Up</span>
						</div>
					</div>
				</div>
				<div class="panel" title="Panel 5">
					
				</div>
				

			</div>
		</div>

		<a href="#1" class="cross-link active-thumb"><img src="images/tempphoto-1thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a>
		<div id="movers-row">
			<div><a href="#2" class="cross-link"><img src="images/tempphoto-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#3" class="cross-link"><img src="images/tempphoto-3thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			
			
			
		</div>

	</div>
	
	</div>

</body>

</html>