@extends('layout')
@section('leftsidebar')
<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
						<!--category-products-->
						
						<?php 
							$all_published_category = DB::table('tbl_category')
											->where('publication_status', 1)
											->get();
							
							foreach($all_published_category as $v_category) { ?>
								<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{'/product-by-category/'.$v_category->category_id}}">
											{{$v_category->category_name}}
										</a>
									</h4>
								</div>
								<div id="{{$v_category->category_name}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
						<!--/category-products-->
					
						<div class="brands_products">
						<!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">

								<?php 
							$all_published_manufacture = DB::table('tbl_manufacture')
											->where('publication_status', 1)
											->get();
							
							foreach($all_published_manufacture as $v_manufacture) { ?>
									<li><a href="{{URL::to('/product-by-manufacture/'.$v_manufacture->manufacture_id)}}"> <span class="pull-right">(50)</span>{{$v_manufacture->manufacture_name}}</a></li>
							<?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{URL::to('front-end/images/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>

@endsection
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/customer-login')}}" method="get">
							{{csrf_field()}}
							<input type="email" required="" placeholder="Email" name="customer_email"/>
                            <input type="password" required="" placeholder="Password" name="customer_password" />
							<!-- <span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span> -->
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/customer-registration')}}" method="post">
                        {{csrf_field()}}
							<input type="text" placeholder="Full Name" name="customer_name" required="" />
							<input type="email" placeholder="Email" name="customer_email"  required=""/>
							<input type="password" placeholder="Password" name="customer_password"  required=""/>
                            <input type="text" placeholder="Mobile Number" name="customer_mobile_number" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection