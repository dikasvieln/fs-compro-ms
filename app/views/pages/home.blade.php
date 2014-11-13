@extends('layout.default')

@section('content')
	<!-- Banner -->
			<section id="banner">
				{{ HTML::image('logo/logo_kencana2.png', 'kik logo') }}
			</section>

		<!-- Main -->
			<section id="main" class="container">
		
				<section class="box special">
					<header class="major">
					    <h2>Welcome to Kencana Indonesia Kreasi</h2>
                        <br />

                        <h3><p>Grain and mortar is a strategy branding and design company.</p></h3>
                        <h4>An independent advertising agency in Indonesia that specializing in media buying, planning and monitoring , as well as development ads material.</h4>
                        <h4>We have represent non Indonesian client, from state government to multinational company seeking to gain stronger foothold in Indonesian market.</h4>

						{{--<h2>Welcome to Kencana Indonesia Kreasi</h2>--}}
						{{--<br />--}}
						{{--<p><h3>Grain and mortar is a strategy branding and design company.</h3></p>--}}
					{{--<p>--}}
						{{--
					{{--</p>--}}
					</header>
				</section>
						
				<section class="box special features">
					<div class="features-row">
						<section>
							<span class="icon major fa-bolt accent2"></span>
							<h3>Advertising</h3>
							<p>Media Planning and Buying, Media Monitoring & Implementation, Digital Advertising. </p>
						</section>
						<section>
							<span class="icon major fa-area-chart accent3"></span>
							<h3>Creative</h3>
							<p> Creative Works, Web Design, Brand Development, Merchandising, Photography.</p>
						</section>
					</div>
					<div class="features-row">
						<section>
							<span class="icon major fa-cloud accent4"></span>
							<h3>Point Of Sales Media</h3>
							<p>Modern Trade, General Trade.</p>
						</section>
						<section>
							<span class="icon major fa-lock accent5"></span>
							<h3>Event Planning and Execution Media</h3>
							<p>Brand Activation, M.I.C.E, Special request services can be provided based on request of client</p>
						</section>
					</div>
				</section>
					
				<div class="row">
					<div class="6u 12u(2)">
						<section class="box special">
							<h3>Our Client</h3>
							<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</section>
						
					</div>
					<div class="6u 12u(2)">

						<section class="box special">
							{{--<span class="image featured"><img src="images/pic03.jpg" alt="" /></span>--}}
							<h3>Our Gallery</h3>
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
				
				<h2>Getting To Know Who We Are</h2>
                <h3><p>
                   Senayan Trade Center 2nd Floor Suite 61 Jl. Asia Afrika Gate IX
                   South Jakarta 10270.
                </p></h3>
				<form action="#">
					<div class="row uniform 50%">
						<div class="8u 12u(3)">
							<input type="email" name="email" id="email" placeholder="Email Address" />
						</div>
						<div class="4u 12u(3)">
							<input type="submit" value="Send" class="fit" />
						</div>
					</div>
				</form>
				
			</section>
@stop