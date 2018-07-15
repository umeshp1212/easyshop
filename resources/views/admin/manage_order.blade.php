@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Order Details</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Order</h2>
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
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($all_order_info as $v_order)
                <tr>
                    <td>{{$v_order->order_id}}</td>
                    <td class="center">{{$v_order->customer_name}}</td>
                    <td class="center">{{$v_order->order_total}}</td>
                    <td class="center">
                        @if($v_order->order_status == 'success') 
                            <span class="label label-success">success</span> 
                        
                        @else 
                            <span class="label">Pending</span>
                        
                        @endif
                    </td>
                    <td class="center">
                       @if($v_order->order_status == 1) 
                            <a class="btn btn-danger" href="{{URL::to('/inactive-order/'.$v_order->order_id)}}">                       
                                 <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                        @else 
                             <a class="btn btn-success" href="{{URL::to('/active-order/'.$v_order->order_id)}}">     
                                 <i class="halflings-icon white thumbs-up"></i>
                             </a>    
                        @endif    

                       
                        <a class="btn btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete-order/'.$v_order->order_id)}}">
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