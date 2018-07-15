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
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Contact</h2>
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
                        
                        <th>Inquiry Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($all_inquiry_info as $v_inquiry)
                <tr>
                   
                    <td class="center">{{$v_inquiry->inquiry_id}}</td>
                    <td class="center">{{$v_inquiry->inquiry_name}}</td>
                    <td class="center">{{$v_inquiry->inquiry_email}}</td>
                    <td class="center">{{$v_inquiry->inquiry_subject}}</td>
                    <td class="center">{{$v_inquiry->inquiry_message}}</td>
    
                    <td class="center">                                                
                        <a class="btn btn-danger" href="{{URL::to('/delete-contact/'.$v_inquiry->inquiry_id)}}">
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