@extends('layout')
@section('slider')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php $all_published_slider = DB::table('tbl_slider')
														->where('publication_status', 1)
														->get(); ?>
						@foreach($all_published_slider as $v_slider) 
							<li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
						@endforeach
						</ol>
						<div class="carousel-inner">
			            @foreach($all_published_slider as $v_slider)
							<div class="item {{$loop->first ? 'active' : ''}}">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{URL::to($v_slider->slider_image)}}" class="girl img-responsive" alt="" />
									<img src="{{asset('front-end/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
						@endforeach
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
@endsection
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
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
    <section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                    $contents = Cart::content();
                    // echo "<pre>";
                    // print_r($contents);
                    // echo "</pre>";

                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php if(count($contents) > 0 ) { ?>
                      @foreach($contents as $v_contents)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="50px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

                                    <form action="{{URL::to('/update-cart')}}" method="post">
                                        {{csrf_field()}}
                                        <input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
                                        <input type="hidden" name="rowId" value="{{$v_contents->rowId}}">
                                        <input type="submit" name="submit" value="Update">
                                    </form>    
                                        
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">
                            
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>

							</td>
						</tr>
                       @endforeach 
					   <?php } else { ?>
					     <tr>
						 	<td colspan="6"><p class="text-center">No Product in Cart</td>
						 </tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->    
    <div class="container col-sm-12">
        <div class="row">
            <div class="paymentCont">
                            <div class="headingWrap">
                                    <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                                    <p class="text-center">Created with bootsrap button and using radio button</p>
                            </div>
                            <form action="{{url('/order-place')}}" method="post">
                            {{csrf_field()}}
                                <div class="paymentWrap">
                                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                        <label class="btn paymentMethod active">
                                            <div class="method visa"></div>
                                            <input type="radio" name="payment_gateway" value="visa" checked> 
                                        </label>
                                        <label class="btn paymentMethod">
                                            <div class="method master-card"></div>
                                            <input type="radio" name="payment_gateway" value="mastercard" > 
                                        </label>
                                        <label class="btn paymentMethod">
                                            <div class="method amex"></div>
                                            <input type="radio" name="payment_gateway" value="amex" >
                                        </label>
                                        <label class="btn paymentMethod">
                                            <div class="method vishwa"></div>
                                            <input type="radio" name="payment_gateway" value="vishwa" > 
                                        </label>
                                        <label class="btn paymentMethod">
                                            <div class="method ez-cash"></div>
                                            <input type="radio" name="payment_gateway" value="ez-cash"> 
                                        </label>
                                    
                                    </div>        
                                </div>
                                <div class="footerNavWrap clearfix">
                                    <a href="{{URL::to('')}}"><div class="btn btn-success pull-left btn-fyi">
                                    <!-- <span class="glyphicon glyphicon-chevron-left"></span>  -->
                                    CONTINUE SHOPPING</div></a>
                                    <!-- <div class="btn btn-success "> -->
                                    <input type="submit" value="SUBMIT" class="btn btn-success pull-right btn-fyi">
                                    <!-- <span class="glyphicon glyphicon-chevron-right"></span></div> -->
                                </div>
                            </form>    
                        </div>	
        </div>
    </div>
                    
        </div>
</div><!--/recommended_items-->
				</div>					
@endsection