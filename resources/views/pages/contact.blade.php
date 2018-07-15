@extends('layout')
@section('content')
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="{{url('/save-inquiry')}}" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                         {{csrf_field()}}
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
								<p class="alert-success">
										<?php
										$message = Session::get('message');
										if($message){
											echo $message;
											Session::put('message', null);
										}
										?>
								</p>
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
				<?php $contact_info = DB::table('tbl_contact')
														->where('publication_status', 1)
														->get(); 
														// echo "<pre>";
														// print_r($contact_info);
														// echo "</pre>";
														
														?>

	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
						@foreach($contact_info as $v_contact)
	    				<address>
	    					<p>{{$v_contact->contact_company_name}}</p>
							<p>{{$v_contact->contact_address1}}</p>
							<p>{{$v_contact->contact_city}}</p>
							<p>Mobile: {{$v_contact->contact_mobile_number}}</p>
							<p>Fax: {{$v_contact->contact_fax}}</p>
							<p>Email: {{$v_contact->contact_email}}</p>
	    				</address>
						@endforeach
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
@endsection()