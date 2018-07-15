@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Contact Detail</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <p class="alert-success">
            <?php
                $message = Session::get('message');
                if($message) { 
                    echo $message;
                    Session::put('message', null);
                }
            ?>
        </p>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/update-contact', $contact_info->contact_id)}}" method="POST">
                {{csrf_field()}}
                <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Company Name</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_company_name" value="{{$contact_info->contact_company_name}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Address 1</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_address1" value="{{$contact_info->contact_address1}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">City</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_city" value="{{$contact_info->contact_city}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Mobile</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_mobile_number" value="{{$contact_info->contact_mobile_number}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Fax</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_fax" value="{{$contact_info->contact_fax}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Email</label>
                    <div class="controls">
                    <input type="text" class="input-xlarge" name="contact_email" value="{{$contact_info->contact_email}}">
                    </div>
                </div>
                <!-- <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Publication Status</label>
                    <div class="controls">
                    <input type="checkbox" name="publication_status" value="1">
                    </div>
                </div> -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Contact</button>
                    <button type="reset" class="btn">Cancel</button>                    
                </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection