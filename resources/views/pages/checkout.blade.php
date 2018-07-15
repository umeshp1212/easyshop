@extends('layout')
@section('content')
<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<p>Please fillup this form...............</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">					
					<div class=" col-sm-12 clearfix">
						<div class="bill-to">
						    <p>Bill To</p>
							<div class="form-one">
								<form action="{{url('/save-shipping-details')}}" method="post">
								{{csrf_field()}}
								    <input type="text" name="shipping_first_name" placeholder="First Name *" required="">
									<input type="text" name="shipping_last_name" placeholder="Last Name *" required="">									
									<input type="text" name="shipping_email" placeholder="Email*" required="">																	
									<input type="text" name="shipping_address" placeholder="Address *" required="">
									<input type="text" name="shipping_mobile_number" placeholder="Mobile Number *" required="">
									<input type="text" name="shipping_city" placeholder="City *" required="">
									<input clas="btn btn-default check_out" type="submit" name="submit" value="Done">
								</form>
							</div>						
						</div>
					</div>					
				</div>
			</div>			
		</div>
	</section> <!--/#cart_items-->

</div><!--/recommended_items-->
				</div>


@endsection