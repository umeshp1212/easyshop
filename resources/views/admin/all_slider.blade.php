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
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
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
                        <th>Slider ID</th>
                        <th>Product Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($all_slider_info as $v_slider)
                <tr>
                    <td>{{$v_slider->slider_id}}</td>
                    
                    <td class="center"><img width="50" src="{{URL::to($v_slider->slider_image)}}"></td>
                                        
                    <td class="center">
                        @if($v_slider->publication_status == 1) 
                            <span class="label label-success">Active</span> 

                        @else 
                            <span class="label">Inactive</span>
                            
                        @endif
                    </td>
                    <td class="center">
                       @if($v_slider->publication_status == 1) 
                            <a class="btn btn-danger" href="{{URL::to('/inactive-slider/'.$v_slider->slider_id)}}">                       
                                 <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                        @else 
                             <a class="btn btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">     
                                 <i class="halflings-icon white thumbs-up"></i>
                             </a>    
                        @endif    

                       
                        <a class="btn btn-info" href="{{URL::to('/edit-slider/'.$v_slider->slider_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}">
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