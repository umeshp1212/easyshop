@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <p class="alert-success">
            <?php
             $message = Session::get('message');
             if($message){
                 echo $message;
                 Session::put('message', null);
             }
            ?>
        </p>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Color</th>
                        <th>Category Name</th>
                        <th>Manufacture Name</th>

                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($all_product_info as $v_product)
                <tr>
                    <td>{{$v_product->product_id}}</td>
                    <td class="center">{{$v_product->product_name}}</td>
                    <td class="center">{{$v_product->product_long_description}}</td>
                    <td class="center"><img src="{{URL::to($v_product->product_image)}}"></td>
                    <td class="center">{{$v_product->product_price}}</td>
                    <td class="center">{{$v_product->product_color}}</td>
                    <td class="center">{{$v_product->category_name}}</td>
                    <td class="center">{{$v_product->manufacture_name}}</td>
                    
                    <td class="center">
                        @if($v_product->publication_status == 1) 
                            <span class="label label-success">Active</span> 

                        @else 
                            <span class="label">Inactive</span>
                            
                        @endif
                    </td>
                    <td class="center">
                       @if($v_product->publication_status == 1) 
                            <a class="btn btn-danger" href="{{URL::to('/inactive-product/'.$v_product->product_id)}}">                       
                                 <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                        @else 
                             <a class="btn btn-success" href="{{URL::to('/active-product/'.$v_product->product_id)}}">     
                                 <i class="halflings-icon white thumbs-up"></i>
                             </a>    
                        @endif    

                       
                        <a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection