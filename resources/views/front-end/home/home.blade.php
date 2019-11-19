@include('front-end.layouts.home_top_header')
@include('front-end.layouts.home_header')




		<!-- //header -->

		<!-- //header Ends-->

		<!-- banner -->
		<div class="banner_iscorepvt position-relative">
			<div class="container">
				<div class="d-md-flex">
					<div class="col-md-6 col-sm-9 iscore_banner_txt">
						<h3 class="iscore_pvt-title">Renting reimagined</h3>
						<p class="text-sty-banner">Pay rent and rate your landlord.</p>
						<a href="signin" class="btn button-style mt-md-3 mt-3">Get Started</a>
					</div>
					<div class="col-md-6 banner-img">
						<img src="assets/images/iscore-hero-image.png" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->

	<!-- what we do section -->
	<div class="what bg-li-curve py-5" id="what">
		<div class="container py-xl-5 py-lg-3">
			<div class="about-right-faq">
			<h6 class="text-red text-center">SMART</h6>
			<h3 class="text-da  text-center">Smarter decisions for everyone</h3>
			<p class="mt-4  text-center">Share and verify details such as rental history before signing agreements</p>
			</div>
			<div class="row about-bottom-iscore text-center mt-4">
					<div class="col-lg-4 about-grid offset-md-2">
						<div class="about-grid-main">
							<img src="assets/images/iconTenant.svg" alt="" width="100" class="img-fluid">
							<h4 class="my-4">For Tenants</h4>
							<p>Apply with one click with a verified rental profile that you can share with a prospective owners</p>
							<a href="signup" class="button-iscore btn mt-sm-5 mt-4">Get started&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<div class="col-lg-4 about-grid my-lg-0 my-5">
						<div class="about-grid-main">
							<img src="assets/images/iconLandlord.svg" alt="" width="100" class="img-fluid">
							<h4 class="my-4">For Landlords/Agents</h4>
							<p>Approve rentals with verified rental profiles and other tenant lease management tools</p>
							<a href="signup" class="button-iscore btn mt-sm-5 mt-4">Get started&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<!--<div class="col-lg-3 about-grid">
						<div class="about-grid-main">
							<img src="assets/images/iconAgent.svg" alt="" width="100" class="img-fluid">
							<h4 class="my-4">For Agents</h4>
							<p>Qualify your leads with verified rental profiles and property management tools</p>
							<a href="signup" class="button-iscore btn mt-sm-5 mt-4">Get started&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 about-grid">
							<div class="about-grid-main">
								<img src="assets/images/iconListings.svg" alt="" width="100" class="img-fluid">
								<h4 class="my-4">For Property Sites</h4>
								<p>Add value to property owners on your site by providing them the tools to manage their listing</p>
								<a href="signup" class="button-iscore btn mt-sm-5 mt-4">Get started&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
							</div>
						</div>-->
				</div>
		</div>
	</div>
	<!-- //what we do section -->



	<!-- stats -->
	<!-- faq -->
	<div class="about-inner py-5" id="faqs">
			<div class="container pb-xl-5 pb-lg-3">
				<div class="row py-xl-4">
					<div class="col-lg-4 about-right-faq">
						<h3 class="mt-2 mb-3">Frequently asked questions</h3>
					</div>
					<div class="col-lg-8 about-right-faq">
					<!-- accordions -->
					<ul class="accordion css-accordion mt-md-2 mt-sm-5">
						<li class="accordion-item">
							<input class="accordion-item-input" type="checkbox" name="accordion" id="item1" />
							<label for="item1" class="accordion-item-hd">What is my Immoscore?<span
								 class="accordion-item-hd-cta">&#9650;</span></label>
							<div class="accordion-item-bd">
								<p>Your Immoscore is your rating based on how you pay rent, you take care of your rental apartment .</p>
							</div>
						</li>
                                                
                                                <li class="accordion-item">
							<input class="accordion-item-input" type="checkbox" name="accordion" id="item2" />
							<label for="item2" class="accordion-item-hd">How do I know which sites I can apply with immoscore?<span
								 class="accordion-item-hd-cta">&#9650;</span></label>
							<div class="accordion-item-bd">
								<p>The sites you can apply for will have an Apply with Immoscore button on the listing page. For somw properties, an immoscore icon will appear to show it is a rated property on immoscore.</p>
							</div>
						</li>
                                                
                                                
                                                
						<li class="accordion-item">
							<input class="accordion-item-input" type="checkbox" name="accordion" id="item3" />
							<label for="item3" class="accordion-item-hd">Can I complete the profile on behalf of someone else?<span class="accordion-item-hd-cta">&#9650;</span></label>
							<div class="accordion-item-bd">
								<p>Yes, but this feature is only available to agents at the moment.</p>
							</div>
						</li>
						<li class="accordion-item">
							<input class="accordion-item-input" type="checkbox" name="accordion" id="item4" />
							<label for="item4" class="accordion-item-hd">Can I add my listing directly on immoscore?
								<span class="accordion-item-hd-cta">&#9650;</span></label>
							<div class="accordion-item-bd">
								<p>As an agent, landlord or homeowner, yes you can.</p>
							</div>
						</li>
						<li class="accordion-item">
							<input class="accordion-item-input" type="checkbox" name="accordion" id="item5" />
							<label for="item5" class="accordion-item-hd">What if I want to remove my profile when my status has changed from tenant to homeowner?<span class="accordion-item-hd-cta">&#9650;</span></label>
							<div class="accordion-item-bd">
								<p>You can cancel your account or you can transition to landlord and just fill in a few more details</p>
							</div>
						</li>
					</ul>
					<!-- //accordions -->
					</div>
				</div>

			</div>
		</div>
		<!-- //faq -->
	<!-- //stats -->

@include('front-end.layouts.footer')


</body>

</html>
