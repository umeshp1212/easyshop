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
        <h2 class="title text-center">Features Items</h2>
        @if(count($all_products_info) > 0)
        @foreach($all_products_info as $v_products)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_products->product_image)}}" alt="" />
                        <h2>{{$v_products->product_price}}</h2>                    
                        <a href="{{URL::to('/view-product/'.$v_products->product_id)}}"><p>{{$v_products->product_name}}</p></a>
                        <a href="{{'/view-product/'.$v_products->product_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$v_products->product_price}}</h2>
                            <a href="{{URL::to('/view-product/'.$v_products->product_id)}}"><p>{{$v_products->product_name}}</p></a>
                            <a href="{{'/view-product/'.$v_products->product_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{'/product-by-manufacture/'.$v_products->manufacture_id}}"><i class="fa fa-plus-square"></i>{{$v_products->manufacture_name}}</a></li>
                        <li><a href="{{'/view-product/'.$v_products->product_id}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
        
    </div><!--features_items-->
    <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>
</div>



@endsection