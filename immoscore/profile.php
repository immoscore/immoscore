<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
	<title></title>
</head>
<body>
	<div class="kt-container kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
				<!-- begin:: Subheader -->
				<div class="kt-subheader kt-grid__item" id="kt_subheader">
					<div class="kt-container d-flex justify-content-center text-center">
						<div class="kt-subheader__main">
							<h1 class="kt-subheader__title">To get started, tell us a little about yourself</h1>
							<h3 class="kt-subheader__desc">We will calculate your score based on the information you enter</h3>
						</div>
					</div>
				</div><!-- end:: Subheader -->
				<!-- begin:: Content -->
				<div class="kt-container kt-grid__item kt-grid__item--fluid">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="is-form_usertype">
								<ul class="nav nav-pills nav-tabs-btn" role="tablist">
									<li class="nav-item flex-fill">
										<a class="nav-link" data-toggle="tab" href="#tabTenant" role="tab">
											<span class="nav-link-icon"><i class="fas fa-user fa-3x"></i></span>
											<span class="nav-link-title">I'm a tenant</span>
										</a>
									</li> 
									<li class="nav-item flex-fill">
										<a class="nav-link" data-toggle="tab" href="#tabLandlord" role="tab">
											<span class="nav-link-icon"><i class="fas fa-user-lock fa-3x"></i></span>
											<span class="nav-link-title">I'm a landlord</span>
										</a>
									</li>                   
									<li class="nav-item flex-fill">
									<a class="nav-link" data-toggle="tab" href="#tabAgent" role="tab">
											<span class="nav-link-icon"><i class="fas fa-user-tie fa-3x"></i></span>
											<span class="nav-link-title">I'm an agent</span>
										</a>
									</li>
								</ul>                                

								<div class="tab-content">
									<div class="tab-pane fade" id="tabTenant" role="tabpanel">
										<!--begin::Portlet-->
										<div class="kt-portlet">
											<!--begin::Form-->
											<form class="kt-form">
												<div class="kt-portlet__body">
													<div class="kt-section kt-section--first">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Customer Info:</h3>
															<div class="form-group row">
																<label class="col-3 col-form-label">First Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="Nick">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Last Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="Watson">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Email Address</label>
																<div class="col-9">
																	<div class="input-group">
																		<input class="form-control" placeholder="Enter email" type="email" value="example@youremail.com"> 
																	</div>
																	<span class="form-text text-muted">We'll never share your email with anyone else.</span>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Phone Number</label>
																<div class="col-9">
																	<div class="input-group">
																		<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																		<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">ID/Passport Number</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="e.g A3453DG">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Proof of ID</label>
																<div class="col-9">
																	<div></div>
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="customFile">
																		<label class="custom-file-label" for="customFile">Choose file</label>
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Nationality</label>
																<div class="col-9">
																	<div></div>
																	<select class="custom-select form-control">
																		<option selected="">Country of origin</option>
																		<option value="British">British</option>
																		<option value="German">German</option>
																		<option value="Polish">Polish</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">What do you do?</h3>
															<div class="form-group row">
																<div class="col-12">
																	<ul class="nav nav-pills nav-tabs-btn" role="tablist">
																		<li class="nav-item flex-fill">
																			<a class="nav-link" data-toggle="tab" href="#tabEmployed" role="tab">
																				<span class="nav-link-title">Employed</span>
																			</a>
																		</li> 
																		<li class="nav-item flex-fill">
																			<a class="nav-link" data-toggle="tab" href="#tabStudent" role="tab">
																				<span class="nav-link-title">Student</span>
																			</a>
																		</li>                   
																		<li class="nav-item flex-fill">
																		<a class="nav-link" data-toggle="tab" href="#tabBusiness" role="tab">
																				<span class="nav-link-title">Business Owner</span>
																			</a>
																		</li>
																	</ul>                                

																	<div class="tab-content">
																		<div class="tab-pane fade" id="tabEmployed" role="tabpanel">
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Where do you work?</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="Nick">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Who is your supervisor?</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="Watson">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Where is the company located?</label>
																				<div class="col-9">
																					<div class="input-group">
																						<input class="form-control" placeholder="Enter company address" type="email"> 
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Company Phone Number</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																						<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">How many months have you had the job?</label>
																				<div class="col-9">
																					<input class="form-control" type="number" value="42" id="example-number-input">
																				</div>
																			</div>    
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Annual salary</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>€10,000-20,000</option>
																						<option value="1">€20,000-30,000</option>
																						<option value="1">€30,000-40,000</option>
																						<option value="1">€40,000-50,000</option>
																						<option value="1">€50,000-60,000</option>
																						<option value="1">€60,000-70,000</option>
																						<option value="1">€70,000-80,000</option>
																					</select>
																				</div>
																			</div>                 
																		</div>
																		<div class="tab-pane fade" id="tabStudent" role="tabpanel">
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Name of the institution</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="Nick">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Student ID Number</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="Watson">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Upload Student ID</label>
																				<div class="col-9">
																					<div></div>
																					<div class="custom-file">
																						<input type="file" class="custom-file-input" id="customFile">
																						<label class="custom-file-label" for="customFile">Choose file</label>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="tab-pane fade" id="tabBusiness" role="tabpanel">
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Type of Business</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option value="Sole Trader">Sole Trader</option>
																						<option value="Partnership">Partnership</option>
																						<option value="Limited Company">Limited Company</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Name of your business</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">SIRET number</label>
																				<div class="col-9">
																					<div class="input-group">
																						<input class="form-control" placeholder="Enter SIRET number" type="text"> 
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">KBIS Extract</label>
																				<div class="col-9">
																					<div></div>
																					<div class="custom-file">
																						<input type="file" class="custom-file-input" id="customFile">
																						<label class="custom-file-label" for="customFile">Choose file</label>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div> 
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Last Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="Watson">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Email Address</label>
																<div class="col-9">
																	<div class="input-group">
																		<input class="form-control" placeholder="Enter email" type="email" value="example@youremail.com"> 
																	</div>
																	<span class="form-text text-muted">We'll never share your email with anyone else.</span>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Phone Number</label>
																<div class="col-9">
																	<div class="input-group">
																		<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																		<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">ID/Passport Number</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="e.g A3453DG">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Proof of ID</label>
																<div class="col-9">
																	<div></div>
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="customFile">
																		<label class="custom-file-label" for="customFile">Choose file</label>
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Nationality</label>
																<div class="col-9">
																	<div></div>
																	<select class="custom-select form-control">
																		<option selected="">Country of origin</option>
																		<option value="British">British</option>
																		<option value="German">German</option>
																		<option value="Polish">Polish</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Financial Details:</h3>
															<div class="form-group row">
																<label class="col-3 col-form-label">Main source of income</label>
																<div class="col-9">
																	<select class="form-control" id="salarySelect">
																		<option>Salary</option>
																		<option value="1">Pension</option>
																		<option value="1">Benefits</option>
																		<option value="1">Tax Returns</option>
																		<option value="1">Student Scholarship</option>
																		<option value="1">Contracts</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Proof of income</label>
																<div class="col-9">
																	<div></div>
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="customFile">
																		<label class="custom-file-label" for="customFile">Choose file</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Rental history:</h3>
															<div class="kt-repeater">
																<div class="kt-repeater__data-set">
																	<div data-repeater-list="demo3-list2">
																		<div data-repeater-item class="kt-repeater__item">
																			<h4 class="kt-section__title">Rental Location</h4>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Physical Address</label>
																				<div class="col-9">
																					<div class="input-group">
																						<input type="text" class="form-control" placeholder="Enter poscode">
																						<div class="input-group-append">
																							<button class="btn btn-brand" type="button">Find address</button>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Select your address</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>3 results found</option>
																						<option value="1">23 Paris Ave</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Size of apartment</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="How many square meters?">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">How many bedrooms?</label>
																				<div class="col-9">
																					<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
																						<input id="bedroomsSpinner" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="" name="bedroomsSpinner" placeholder="40">
																						
																						<span class="input-group-btn-vertical">
																							<button class="btn btn-secondary bootstrap-touchspin-up " type="button"><i class="la la-plus"></i></button>
																							<button class="btn btn-secondary bootstrap-touchspin-down " type="button"><i class="la la-minus"></i></button>
																						</span>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Type of agreement</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>Leaseholder</option>
																						<option value="1">Sublet</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">How long did you live there?</label>
																				<div class="col-9">
																					<input type="text" class="form-control" id="kt_daterangepicker_1" readonly placeholder="Select time">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Rent per month</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">€</span></div>
																						<input type="number" class="form-control" placeholder="" aria-describedby="basic-addon2">
																						<div class="input-group-append"><span class="input-group-text" id="basic-addon2">per month</span></div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Did you pay a deposit?</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend">
																							<span class="input-group-text">
																								<label class="kt-checkbox kt-checkbox--single kt-checkbox--success">
																									<input type="checkbox" checked="">
																									<span></span>
																								</label>
																							</span>
																							<span class="input-group-text">€</span>
																						</div>
																						<input type="text" placeholder="How much was the deposit?" class="form-control" aria-label="Text input with checkbox">
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">How much of your deposit back?</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend">
																							<span class="input-group-text">
																								<label class="kt-checkbox kt-checkbox--single kt-checkbox--success">
																									<input type="checkbox" checked="">
																									<span></span>
																								</label>
																							</span>
																							<span class="input-group-text">€</span>
																						</div>
																						<input type="text" placeholder="How much was the deposit?" class="form-control" aria-label="Text input with checkbox">
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Who did you rent from?</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>Agent</option>
																						<option>Landlord</option>
																						<option value="1">Leaseholder</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Their Name</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="Watson">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Their Email Address</label>
																				<div class="col-9">
																					<div class="input-group">
																						<input class="form-control" placeholder="Enter email" type="email" value="example@youremail.com"> 
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Their Phone Number</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																						<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Upload Rent Receipts</label>
																				<div class="col-9">
																					<div></div>
																					<div class="custom-file">
																						<input type="file" class="custom-file-input" id="customFile">
																						<label class="custom-file-label" for="customFile">Choose file</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Rate your landlord</label>
																				<div class="col-9">
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Signing & Letting</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Customer Service</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Repair Efficiency</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Security</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Value for Money</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Felt Like Home</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Moving Out Experience</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																					<div class="input-group">
																						<label class="col-6 col-form-label label-rating">Deposit Handling</label>
																						<div class="col-6 btn-group mr-2" role="group" aria-label="First group">
																							<button type="button" class="btn btn-secondary btn-sm">1</button>
																							<button type="button" class="btn btn-secondary btn-sm">2</button>
																							<button type="button" class="btn btn-secondary btn-sm">3</button>
																							<button type="button" class="btn btn-secondary btn-sm">4</button>
																							<button type="button" class="btn btn-secondary btn-sm">5</button>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Additional Comments</label>
																				<div class="col-9">
																				<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
																				</div>
																			</div>
																			<div class="kt-repeater__data form-group">
																				<span data-repeater-delete="" class="btn btn-warning  btn-sm">
																					<i class="la la-close"></i> Remove
																				</span>
																			</div>
																			<div class="kt-separator kt-separator--border-dashed"></div>
																			<div class="kt-separator kt-separator--height-sm"></div>
																		</div>
																	</div>
																</div>
																<div class="kt-repeater__add-data">
																	<span data-repeater-create="" class="btn btn-danger btn-sm">
																		<i class="la la-plus"></i> Add another rental
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="kt-portlet__foot">
													<div class="kt-form__actions kt-form__actions--right">
														<div class="row">
															<div class="col kt-align-left">
																<button type="reset" class="btn btn-brand">Submit</button>
																<button type="reset" class="btn btn-secondary">Cancel</button>
															</div>
															<div class="col kt-align-right">
																<button type="reset" class="btn btn-metal">Delete</button>
															</div>
														</div>
													</div>
												</div>
											</form><!--end::Form-->
										</div>
										<!--end::Portlet-->                       
									</div>
									<div class="tab-pane fade" id="tabLandlord" role="tabpanel">
										<!--begin::Portlet-->
										<div class="kt-portlet">
											<!--begin::Form-->
											<form class="kt-form">
												<div class="kt-portlet__body">
													<div class="kt-section kt-section--first">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Landlord Info:</h3>
															<div class="form-group row">
																<label class="col-3 col-form-label">First Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="Nick">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Last Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="Watson">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Email Address</label>
																<div class="col-9">
																	<div class="input-group">
																		<input class="form-control" placeholder="Enter email" type="email" value="example@youremail.com"> 
																	</div>
																	<span class="form-text text-muted">We'll never share your email with anyone else.</span>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Phone Number</label>
																<div class="col-9">
																	<div class="input-group">
																		<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																		<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">ID/Passport Number</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="e.g A3453DG">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Proof of ID</label>
																<div class="col-9">
																	<div></div>
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="customFile">
																		<label class="custom-file-label" for="customFile">Choose file</label>
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">SIRET number</label>
																<div class="col-9">
																	<div class="input-group">
																		<input class="form-control" placeholder="Enter SIRET number" type="text"> 
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Nationality</label>
																<div class="col-9">
																	<div></div>
																	<select class="custom-select form-control">
																		<option selected="">Country of origin</option>
																		<option value="British">British</option>
																		<option value="German">German</option>
																		<option value="Polish">Polish</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Rental Properties:</h3>
															<div class="kt-repeater">
																<div class="kt-repeater__data-set">
																	<div data-repeater-list="demo3-list2">
																		<div data-repeater-item class="kt-repeater__item">
																			<h4 class="kt-section__title kt-section__title-lg">Rental Location</h4>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Physical Address</label>
																				<div class="col-9">
																					<div class="input-group">
																						<input type="text" class="form-control" placeholder="Enter poscode">
																						<div class="input-group-append">
																							<button class="btn btn-brand" type="button">Find address</button>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Select your address</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>3 results found</option>
																						<option value="1">23 Paris Ave</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Type of ownership</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>Fully Owned</option>
																						<option value="1">Flatshare</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Type of property</label>
																				<div class="col-9">
																					<select class="form-control" id="salarySelect">
																						<option>Flat</option>
																						<option>Semi-detached House</option>
																						<option value="1">Detached House</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">How many bedrooms?</label>
																				<div class="col-9">
																					<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
																						<input id="bedroomsSpinner" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="" name="bedroomsSpinner" placeholder="40">
																						
																						<span class="input-group-btn-vertical">
																							<button class="btn btn-secondary bootstrap-touchspin-up " type="button"><i class="la la-plus"></i></button>
																							<button class="btn btn-secondary bootstrap-touchspin-down " type="button"><i class="la la-minus"></i></button>
																						</span>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Size of apartment</label>
																				<div class="col-9">
																					<input class="form-control" type="text" value="How many square meters?">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Rent per month</label>
																				<div class="col-9">
																					<div class="input-group">
																						<div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">€</span></div>
																						<input type="number" class="form-control" placeholder="" aria-describedby="basic-addon2">
																						<div class="input-group-append"><span class="input-group-text" id="basic-addon2">per month</span></div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-3 col-form-label">Description</label>
																				<div class="col-9">
																				<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
																				</div>
																			</div>
																			<div class="kt-repeater__data form-group">
																				<span data-repeater-delete="" class="btn btn-warning  btn-sm">
																					<i class="la la-close"></i> Remove
																				</span>
																			</div>
																			<div class="kt-separator kt-separator--border-dashed"></div>
																			<div class="kt-separator kt-separator--height-sm"></div>
																		</div>
																	</div>
																</div>
																<div class="kt-repeater__add-data">
																	<span data-repeater-create="" class="btn btn-danger btn-sm">
																		<i class="la la-plus"></i> Add rental property
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section">
														<div class="kt-section__body">
															<h3 class="kt-section__title kt-section__title-lg">Financial Details:</h3>
															<div class="form-group row">
																<label class="col-3 col-form-label">Bank Account Name</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="">
																</div>
															</div><div class="form-group row">
																<label class="col-3 col-form-label">Bank Account Number</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">Bank</label>
																<div class="col-9">
																	<select class="form-control" id="bankSelect">
																		<option>Crédit Agricole (CA)</option>
																		<option value="1">BNP Paribas</option>
																		<option value="1">Société Générale</option>
																		<option value="1">Caisse d'Epargne (CE)</option>
																		<option value="1">Banque Populaire (BP)</option>
																		<option value="1">Crédit Mutuel</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-3 col-form-label">IBAN Number</label>
																<div class="col-9">
																	<input class="form-control" type="text" value="">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="kt-portlet__foot">
													<div class="kt-form__actions kt-form__actions--right">
														<div class="row">
															<div class="col kt-align-left">
																<button type="reset" class="btn btn-brand">Submit</button>
																<button type="reset" class="btn btn-secondary">Cancel</button>
															</div>
															<div class="col kt-align-right">
																<button type="reset" class="btn btn-metal">Delete</button>
															</div>
														</div>
													</div>
												</div>
											</form><!--end::Form-->
										</div>
										<!--end::Portlet--> 
									</div>
									<div class="tab-pane fade" id="tabAgent" role="tabpanel">
										<!--begin::Portlet-->
										<div class="kt-portlet">
											<!--begin::Form-->
											<form class="kt-form">
												<div class="kt-portlet__body">
													<div class="kt-section kt-section--first">
														<h3 class="kt-section__title kt-section__title-lg">Agent Info:</h3>
														<div class="form-group row">
															<label class="col-3 col-form-label">Company Name</label>
															<div class="col-9">
																<input class="form-control" type="text" value="Nick">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Contact Person</label>
															<div class="col-9">
																<input class="form-control" type="text" value="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Physical Address</label>
															<div class="col-9">
																<div class="input-group">
																	<input type="text" class="form-control" placeholder="Enter poscode">
																	<div class="input-group-append">
																		<button class="btn btn-brand" type="button">Find address</button>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Select your address</label>
															<div class="col-9">
																<select class="form-control" id="salarySelect">
																	<option>3 results found</option>
																	<option value="1">23 Agent Ave</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Phone Number</label>
															<div class="col-9">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																	<input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Email Address</label>
															<div class="col-9">
																<div class="input-group">
																	<input class="form-control" placeholder="Enter email" type="email" value="example@youremail.com"> 
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Website</label>
															<div class="col-9">
																<div class="input-group">
																	<input class="form-control" placeholder="Website URL" type="text"> 
																</div>
															</div>
														</div>
													</div>
													<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
													<div class="kt-section kt-section--first">
														<h3 class="kt-section__title kt-section__title-lg">Business Details:</h3>
														<div class="form-group row">
															<label class="col-3 col-form-label">SIRET Number</label>
															<div class="col-9">
																<input class="form-control" type="text" value="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Property Listing Websites Used</label>
															<div class="col-lg-6">
																<div class="kt-repeater">
																	<div data-repeater-list="demo1">
																		<div data-repeater-item class="kt-repeater__item">
																			<div class="input-group">
																				<div class="input-group-prepend"><span class="input-group-text"><i class="la la-chain"></i></span></div>
																				<input type="text" class="form-control" placeholder="PEnter website URL">
																				<div class="input-group-append">
																					<button data-repeater-delete="" class="btn btn-danger btn-icon">
																						<i class="la la-close kt-font-light"></i>
																					</button>
																				</div>
																			</div>	
																			<div class="kt-separator kt-separator--space-sm"></div>
																		</div>
																	</div>
																	<div class="kt-repeater__add-data">
																		<span data-repeater-create="" class="btn btn-info btn-sm">
																			<i class="la la-plus"></i> Add Listing Website
																		</span>
																	</div>
																</div>
															</div>
														</div>	
													</div>
												</div>
												<div class="kt-portlet__foot">
													<div class="kt-form__actions">
														<div class="row">
															<div class="col-lg-3"></div>
															<div class="col-lg-6">
																<button class="btn btn-success" type="reset">Submit</button> <button class="btn btn-secondary" type="reset">Cancel</button>
															</div>
														</div>
													</div>
												</div>
											</form><!--end::Form-->
										</div>
										<!--end::Portlet--> 
									</div>
								</div> 
							</div>
						</div>
						<!--
						<div class="col-lg-4">
							begin::Portlet
							<div class="kt-portlet kt-portlet--fit">
								<div class="kt-portlet__body kt-portlet__body--fluid">
									<div class="kt-widget-3 kt-widget-3--brand-dark">
										<div class="kt-widget-3__content">
											<div class="kt-widget-3__content-info">
												<div class="kt-widget-3__content-section">
													<div class="kt-widget-3__content-title">Your immoscore</div>
													<div class="kt-widget-3__content-desc"><a href="#" class="kt-link kt-font-bolder">How do I increase this?</a></div>
												</div>
												<div class="kt-widget-3__content-section">
													<span class="kt-widget-3__content-number">273</span>				
												</div>
											</div>	
											<div class="kt-widget-3__content-stats">				
												<div class="kt-widget-3__content-progress">
													<div class="progress">
														
														<div class="progress-bar bg-light" style="width: 72%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="kt-widget-3__content-action">
													<div class="kt-widget-3__content-text">Complete profile</div>
													<div class="kt-widget-3__content-value">70%</div>
												</div>
											</div>
										</div>
									</div>		
								</div>
							</div>

						</div>
						-->
					</div>
				</div><!-- end:: Content -->
			</div>
		</div>
	</div>
	
	<!-- begin:: Footer -->
	<?php include "footer.php" ?>
	<!-- end:: Footer -->


	<!-- end:: Page -->
	<!-- begin:: Topbar Offcanvas Panels -->
	<!-- begin::Offcanvas Toolbar Quick Actions -->
	<div class="kt-offcanvas-panel" id="kt_offcanvas_toolbar_quick_actions">
		<div class="kt-offcanvas-panel__head">
			<h3 class="kt-offcanvas-panel__title">Quick Actions</h3><a class="kt-offcanvas-panel__close" href="#" id="kt_offcanvas_toolbar_quick_actions_close"><i class="flaticon2-delete"></i></a>
		</div>
		<div class="kt-offcanvas-panel__body">
			<div class="kt-grid-nav-v2">
				<a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon2-box"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Orders
				</div></a> <a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon-download-1"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Uploades
				</div></a> <a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon2-supermarket"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Products
				</div></a> <a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon2-avatar"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Customers
				</div></a> <a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon2-list"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Blog Posts
				</div></a> <a class="kt-grid-nav-v2__item" href="#">
				<div class="kt-grid-nav-v2__item-icon">
					<i class="flaticon2-settings"></i>
				</div>
				<div class="kt-grid-nav-v2__item-title">
					Settings
				</div></a>
			</div>
		</div>
	</div><!-- end::Offcanvas Toolbar Quick Actions --><!-- end:: Topbar Offcanvas Panels -->
	<!-- begin:: Quick Panel -->
	<div class="kt-offcanvas-panel" id="kt_quick_panel">
		<div class="kt-offcanvas-panel__nav">
			<ul class="nav nav-pills" role="tablist">
				<li class="nav-item active">
					<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_actions" role="tab">Actions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
				</li>
			</ul><button class="kt-offcanvas-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></button>
		</div>
		<div class="kt-offcanvas-panel__body">
			<div class="tab-content">
				<div class="tab-pane fade show kt-offcanvas-panel__content kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
					<!--Begin::Timeline -->
					<div class="kt-timeline">
						<!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--success">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon-feed kt-font-success"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">02:30 PM</span>
							</div><a class="kt-timeline__item-text" href="">KeenThemes created new layout whith tens of new options for Keen Admin panel</a>
							<div class="kt-timeline__item-info">
								HTML,CSS,VueJS
							</div>
						</div><!--End::Item --><!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--danger">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon-safe-shield-protection kt-font-danger"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">01:20 AM</span>
							</div><a class="kt-timeline__item-text" href="">New secyrity alert by Firewall & order to take aktion on User Preferences</a>
							<div class="kt-timeline__item-info">
								Security, Fieewall
							</div>
						</div><!--End::Item --><!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--brand">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon2-box kt-font-brand"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">Yestardey</span>
							</div><a class="kt-timeline__item-text" href="">FlyMore design mock-ups been uploadet by designers Bob, Naomi, Richard</a>
							<div class="kt-timeline__item-info">
								PSD, Sketch, AJ
							</div>
						</div><!--End::Item --><!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--warning">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon-pie-chart-1 kt-font-warning"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">Aug 13,2018</span>
							</div><a class="kt-timeline__item-text" href="">Meeting with Ken Digital Corp ot Unit14, 3 Edigor Buildings, George Street, Loondon<br>
							England, BA12FJ</a>
							<div class="kt-timeline__item-info">
								Meeting, Customer
							</div>
						</div><!--End::Item --><!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--info">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon-notepad kt-font-info"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">May 09, 2018</span>
							</div><a class="kt-timeline__item-text" href="">KeenThemes created new layout whith tens of new options for Keen Admin panel</a>
							<div class="kt-timeline__item-info">
								HTML,CSS,VueJS
							</div>
						</div><!--End::Item --><!--Begin::Item -->
						<div class="kt-timeline__item kt-timeline__item--accent">
							<div class="kt-timeline__item-section">
								<div class="kt-timeline__item-section-border">
									<div class="kt-timeline__item-section-icon">
										<i class="flaticon-bell kt-font-success"></i>
									</div>
								</div><span class="kt-timeline__item-datetime">01:20 AM</span>
							</div><a class="kt-timeline__item-text" href="">New secyrity alert by Firewall & order to take aktion on User Preferences</a>
							<div class="kt-timeline__item-info">
								Security, Fieewall
							</div>
						</div><!--End::Item -->
					</div><!--End::Timeline -->
				</div>
				<div class="tab-pane fade kt-offcanvas-panel__content kt-scroll" id="kt_quick_panel_tab_actions" role="tabpanel">
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--solid-success">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon kt-hide"><i class="flaticon-stopwatch"></i></span>
								<h3 class="kt-portlet__head-title">Recent Bills</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<div class="kt-portlet__head-group">
									<div class="dropdown dropdown-inline">
										<button aria-expanded="true" aria-haspopup="true" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" type="button"><i class="flaticon-more"></i></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="kt-portlet__content">
								Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry.
							</div>
						</div>
						<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
							<a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">Dismiss</a> <a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">View</a>
						</div>
					</div><!--end::Portlet-->
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--solid-focus">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon kt-hide"><i class="flaticon-stopwatch"></i></span>
								<h3 class="kt-portlet__head-title">Latest Orders</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<div class="kt-portlet__head-group">
									<div class="dropdown dropdown-inline">
										<button aria-expanded="true" aria-haspopup="true" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" type="button"><i class="flaticon-more"></i></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="kt-portlet__content">
								Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry.
							</div>
						</div>
						<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
							<a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">Dismiss</a> <a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">View</a>
						</div>
					</div><!--end::Portlet-->
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--solid-info">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">Latest Invoices</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<div class="kt-portlet__head-group">
									<div class="dropdown dropdown-inline">
										<button aria-expanded="true" aria-haspopup="true" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" type="button"><i class="flaticon-more"></i></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="kt-portlet__content">
								Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry.
							</div>
						</div>
						<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
							<a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">Dismiss</a> <a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">View</a>
						</div>
					</div><!--end::Portlet-->
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--solid-warning">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">New Comments</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<div class="kt-portlet__head-group">
									<div class="dropdown dropdown-inline">
										<button aria-expanded="true" aria-haspopup="true" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" type="button"><i class="flaticon-more"></i></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="kt-portlet__content">
								Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry.
							</div>
						</div>
						<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
							<a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">Dismiss</a> <a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">View</a>
						</div>
					</div><!--end::Portlet-->
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--solid-brand">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">Recent Posts</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<div class="kt-portlet__head-group">
									<div class="dropdown dropdown-inline">
										<button aria-expanded="true" aria-haspopup="true" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" type="button"><i class="flaticon-more"></i></button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="kt-portlet__content">
								Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry.
							</div>
						</div>
						<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
							<a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">Dismiss</a> <a class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light" href="#">View</a>
						</div>
					</div><!--end::Portlet-->
				</div>
				<div class="tab-pane fade kt-offcanvas-panel__content kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
					<form class="kt-form">
						<div class="kt-heading kt-heading--space-sm">
							Notifications
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable notifications:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm"><label><input checked="checked" name="quick_panel_notifications_1" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable audit log:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm"><label><input name="quick_panel_notifications_2" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Notify on new orders:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm"><label><input checked="checked" name="quick_panel_notifications_2" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
						<div class="kt-heading kt-heading--space-sm">
							Orders
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable order tracking:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger"><label><input checked="checked" name="quick_panel_notifications_3" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable orders reports:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger"><label><input name="quick_panel_notifications_3" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Allow order status auto update:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger"><label><input checked="checked" name="quick_panel_notifications_4" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
						<div class="kt-heading kt-heading--space-sm">
							Customers
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable customer singup:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--success"><label><input checked="checked" name="quick_panel_notifications_5" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable customers reporting:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--success"><label><input name="quick_panel_notifications_5" type="checkbox"> <span></span></label></span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Notifiy on new customer registration:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--success"><label><input checked="checked" name="quick_panel_notifications_6" type="checkbox"> <span></span></label></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- end:: Quick Panel -->
	<!-- begin:: Scrolltop -->
	<div class="kt-scrolltop" id="kt_scrolltop">
		<i class="la la-arrow-up"></i>
	</div><!-- end:: Scrolltop -->

	<div class="kt-demo-panel" id="kt_demo_panel">
		<div class="kt-demo-panel__head">
			<h3 class="kt-demo-panel__title">Select A Demo <!--<small>5</small>--></h3><a class="kt-demo-panel__close" href="#" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
		</div>
		<div class="kt-demo-panel__body">
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 1
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo1.png">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo1/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 2
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo2.png">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo2/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item kt-demo-panel__item--active">
				<div class="kt-demo-panel__item-title">
					Demo 3
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo3.png">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo3/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 4
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo4.png">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo4/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 5
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo5.png">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo5/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 6
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo6.jpg">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate" href="demo6/index.html" target="_blank">Preview</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 7
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo7.jpg">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate disabled" href="#">Coming soon</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 8
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo8.jpg">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate disabled" href="#">Coming soon</a>
					</div>
				</div>
			</div>
			<div class="kt-demo-panel__item">
				<div class="kt-demo-panel__item-title">
					Demo 9
				</div>
				<div class="kt-demo-panel__item-preview">
					<img alt="" src="./assets/media//demos/preview/demo9.jpg">
					<div class="kt-demo-panel__item-preview-overlay">
						<a class="btn btn-brand btn-elevate disabled" href="#">Coming soon</a>
					</div>
				</div>
			</div><a class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper" href="https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/" target="_blank">Buy Keen Now!</a>
		</div>
	</div><!-- end::Demo Panel -->
	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
	           var KTAppOptions = {
	   "colors": {
	       "state": {
	           "brand": "#4d5cf2",
	           "metal": "#c4c5d6",
	           "light": "#ffffff",
	           "accent": "#00c5dc",
	           "primary": "#5867dd",
	           "success": "#34bfa3",
	           "info": "#36a3f7",
	           "warning": "#ffb822",
	           "danger": "#fd3995",
	           "focus": "#9816f4"
	       },
	       "base": {
	           "label": [
	               "#c5cbe3",
	               "#a1a8c3",
	               "#3d4465",
	               "#3e4466"
	           ],
	           "shape": [
	               "#f0f3ff",
	               "#d9dffa",
	               "#afb4d4",
	               "#646c9a"
	           ]
	       }
	   }
	};
	</script> <!-- end::Global Config -->


	 <!--begin::Global Theme Bundle(used by all pages) -->
	<script src="./assets/vendors/global/vendors.bundle.js" type="text/javascript"></script> 
	<script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script> 
	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts(used by this page) -->
	<script src="./assets/js/demo3/pages/components/forms/layouts/repeater.js" type="text/javascript"></script>
	<script src="./assets/js/demo3/pages/components/forms/widgets/bootstrap-touchspin.js" type="text/javascript"></script>
    <!--end::Page Scripts -->

	<!-- end::Body -->
</body>
</html>