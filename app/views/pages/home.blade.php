@extends('layout.default')

@section('content')
	<!-- Banner -->
			<section id="banner">
				{{ HTML::image('themes/logo/logo_kencana2.png', 'kik logo') }}
			</section>

		<!-- Main -->
			<section id="main" class="container">
		
				<section class="box special">
					<header class="major">
						<h2>Welcome to Kencana Indonesia Kreasi</h2>
						<p><h3>Grain and mortar is a strategy branding and design company.</h3></p>
					</header>
					<p>
						<h4>An independent advertising agency in Indonesia that specializing in media buying, planning and monitoring , as well as development ads material.</h4>
					
						<h4>We have represent non Indonesian client, from state government to multinational company seeking to gain stronger foothold in Indonesian market.</h4>
					</p>
					<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
				</section>
						
				<section class="box special features">
					<div class="features-row">
						<section>
							<span class="icon major fa-bolt accent2"></span>
							<h3>Article I</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
						</section>
						<section>
							<span class="icon major fa-area-chart accent3"></span>
							<h3>Article II</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
						</section>
					</div>
					<div class="features-row">
						<section>
							<span class="icon major fa-cloud accent4"></span>
							<h3>Article III</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
						</section>
						<section>
							<span class="icon major fa-lock accent5"></span>
							<h3>Article IV</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
						</section>
					</div>
				</section>
					
				<div class="row">
					<div class="6u 12u(2)">

						<section class="box special">
							<span class="image featured"><img src="images/pic02.jpg" alt="" /></span>
							<h3>Sed lorem adipiscing</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</section>
						
					</div>
					<div class="6u 12u(2)">

						<section class="box special">
							<span class="image featured"><img src="images/pic03.jpg" alt="" /></span>
							<h3>Accumsan integer</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</section>

					</div>
				</div>

			</section>
			
		<!-- CTA -->
			<section id="cta">
				
				<h2>Subscribe For The Latest News</h2>

				<form>
					<div class="row uniform 50%">
						<div class="8u 12u(3)">
							<input type="email" name="email" id="email" placeholder="Email Address" />
						</div>
						<div class="4u 12u(3)">
							<input type="submit" value="Sign Up" class="fit" />
						</div>
					</div>
				</form>
				
			</section>
@stop