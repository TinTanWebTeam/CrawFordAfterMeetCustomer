<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">VIA</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="javascript:;">Claim</a></li>
				<li><a href="javascript:;">Docket</a></li>
				<li><a href="javascript:;">Trial Fee</a></li>
				<li><a href="javascript:;">Invoice</a></li>
                <li><a href="javascript:;">Employee</a></li>
                <li><a href="javascript:;">Report Claim</a></li>
				<li><a href="javascript:;">Report Docket</a></li>
				<li><a href="javascript:;">Change Password</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ asset('auth/logout') }}">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>