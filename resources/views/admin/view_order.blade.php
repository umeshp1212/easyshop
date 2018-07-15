@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span4">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name </th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order_by_id as $v_order)
                @endforeach
                    <tr>
                        <td>{{$v_order->customer_name}}</td>
                        <td>{{$v_order->customer_mobile_number}}</td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
    <div class="box span8">
        <div class="box-header">
        <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
        </div>
        <div class="box-content">
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order_by_id as $v_order)
                @endforeach 
                    <tr>
                        <td>{{$v_order->shipping_first_name}}</td>
                        <td>{{$v_order->shipping_mobile_number}}</td>
                        <td>{{$v_order->shipping_email}}
                        <td>{{$v_order->shipping_address}}</td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Sales Quantity</th>
                        <th>Product Sub Total</th>
                    </tr>
                </thead>
                <tbody> 
                  
                      
                   
                    @foreach($order_by_id as $v_order)                                       
                       <tr>
                            <td>{{$v_order->order_id}}</td>
                            <td>{{$v_order->product_name}}</td>
                            <td>{{$v_order->product_price}}</td>
                            <td>{{$v_order->product_sales_quantity}}</td> 
                            <td>{{$v_order->product_price * $v_order->product_sales_quantity}}
                        </tr>

                    @endforeach              
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4">Total With VAT</td>
                    <td>{{$v_order->order_total}}</td>
                </tr> 
                </tfoot>
            </table>
        </div>
    </div>
</div>  

@endsection