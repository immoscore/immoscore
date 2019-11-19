 <?php
 $user = Auth::user();
 ?>
<body>
	<!-- main banner -->
	<div class="main-top" id="home">
		<!-- header -->
		<header>
			<div class="container-fluid">
				<div class="header d-lg-flex justify-content-between align-items-center py-3 px-sm-3">
					<!-- logo -->
					<div id="logo">
						<a href="index.php">
                                                    <img src="{{ asset('/assets/images/web-logo.svg') }}" onerror="this.src=images/web-logo.png; this.onerror=null;" width="125">
                                                </a>

					</div>
					<!-- //logo -->
					<!-- nav -->
					<div class="nav_iscore">
						<nav>
							<label for="drop" class="toggle"><span class="navbar-toggler-icon"></span></label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="{{ url('/home') }}" class="active">Home</a></li>
								<li><a href="#what">How it works ?</a></li>
								<li><a href="#faqs">FAQ'S</a></li>
                                                                <?php if(isset($user->id)) { ?>
								<li><a href="{{ url('/logout') }}">Log Out&nbsp;<i class="far fa-user"></i></a></li>
                                                                <?php } else {  ?>
								<li><a href="{{ url('/signin') }}">Sign in&nbsp;<i class="far fa-user"></i></a></li>
                                                                <?php } ?>
							</ul>
						</nav>
					</div>
					<!-- //nav -->
				</div>
			</div>
		</header>
		<!-- //header -->
