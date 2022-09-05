<!--start header wrapper-->	
<div class="header-wrapper">
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="topbar-logo-header">
						<!---<div class="">
							<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
						</div>--->
						<div class="">
							<h4 class="logo-text">inmind</h4>
						</div>
					</div>
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
					<!---<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>------>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--navigation-->
		<div class="nav-container primary-menu">
			<div class="mobile-topbar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<nav class="navbar navbar-expand-xl w-100">
				<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
					<li class="nav-item dropdown">
					  <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
						
						<div class="menu-title">Dashboard</div>
					</a>
					<ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a class="dropdown-item" href="index2.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
						</li>
					  </ul>
					</li>
					<li class="nav-item dropdown">
						<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
						<div class="menu-title">Product</div>
					  </a>
					  <ul class="dropdown-menu">
                      <li> <a class="dropdown-item" href="{{asset('productadd')}}"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
						</li>
						<li> <a class="dropdown-item" href="{{asset('productlist')}}"><i class="bx bx-right-arrow-alt"></i>Products</a>
						</li>
						
						</ul>
					  </li>
					 <li class="nav-item dropdown">
					  <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
						
						<div class="menu-title">Supplier</div>
					 </a>
					  <ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="{{asset('supplieradd')}}"><i class="bx bx-right-arrow-alt"></i>Add Suppliers</a>
						</li>
						<li> <a class="dropdown-item" href="{{asset('supplierlist')}}"><i class="bx bx-right-arrow-alt"></i>Suppliers List</a>
						</li>
						
					  </ul>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						
						<div class="menu-title">Dearler</div>
					  </a>
					  <ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="{{asset('dealeradd')}}"><i class="bx bx-right-arrow-alt"></i>Add Dealer</a>
						</li>
						<li> <a class="dropdown-item" href="{{asset('dealerlist')}}"><i class="bx bx-right-arrow-alt"></i>Dearler List</a>
						</li>
					  </ul>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						
						<div class="menu-title">Staff</div>
					  </a>
					  <ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="{{asset('staffadd')}}"><i class="bx bx-right-arrow-alt"></i>Add Staff</a>
						</li>
						<li> <a class="dropdown-item" href="{{asset('stafflist')}}"><i class="bx bx-right-arrow-alt"></i>Staff List</a>
						</li>
						
					  </ul>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						
						<div class="menu-title">PO</div>
					  </a>
					  <ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="authentication-signin.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Create PO</a>
						</li>
						<li> <a class="dropdown-item" href="authentication-signup.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>PO List</a>
						</li>
						
					  </ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						 
						  <div class="menu-title">Warehouse</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="user-profile.html"><i class="bx bx-right-arrow-alt"></i>Add Warehouse</a>
							</li>
							<li> <a class="dropdown-item" href="timeline.html"><i class="bx bx-right-arrow-alt"></i>PO List</a>
							</li>
							
						</ul>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						  
						  <div class="menu-title">Delivery</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Add Delivery Order</a>
							</li>
							<li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Delivery List</a>
							</li>
						</ul>
					  </li>
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						  
						  <div class="menu-title">Invoice</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Create Invoice</a>
							</li>
							<li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Invoice List</a>
							</li>
						</ul>
					  </li>
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						 
						  <div class="menu-title">A.R</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Add Payment Received</a>
							</li>
							<li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Payment Received List</a>
							</li>
						</ul>
					  </li>
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						
						  <div class="menu-title">A.P</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Add Expense Record</a>
							</li>
							<li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Expense Record List</a>
							</li>
						</ul>
					  </li>
                      <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						  
						  <div class="menu-title">Commission</div>
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Commission Calculator</a>
							</li>
							<li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Sale Tracker Commission</a>
							</li>
                            <li> <a class="dropdown-item" href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Sale Persons</a>
							</li>
						</ul>
					  </li>
				  </ul>
			</nav>
		</div>
		<!--end navigation-->
	   </div>
	   <!--end header wrapper-->