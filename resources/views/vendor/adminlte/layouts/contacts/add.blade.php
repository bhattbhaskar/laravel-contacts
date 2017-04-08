@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('message.contactsadd') }}
@endsection

@section('contentheader_title')
{{ trans('message.contactsadd') }}
@endsection
@section('main-content')
<!-- searchable dropdown -->
    <div class="row">
        {!! Form::open(array('url' => ('contacts/store'),'method'=>'POST', 'files'=>true)) !!}
        <div class="col-md-12 ">
            @foreach ($errors->all() as $error)
            <p class="alert alert-warning">{{ $error }}</p>
            @endforeach
            <!-- if there are creation errors, they will show here -->
        </div>
        <div class="col-md-12">
                <div class="box box-primary my-form">
                    <div class="box-header">
                        <h3 class="box-title">
                            Contact Details
                        </h3>
                    </div>
                    <div class="box-body">
                         <div class="form-group col-md-9">
                            <i class="fa fa-address-card"></i>
                            {!! Form::text('name', null, array('class' => 'form-control','placeholder'=>'Name','id'=>'name')) !!}
                            <p class="red" id="nameError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-envelope"></i>
                            {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'E-mail','id'=>'email')) !!}
                            <p class="red" id="emailError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-calendar"></i>
                            {!! Form::text('dob', null, array('class' => 'form-control','placeholder'=>'Birth Date','id'=>'dob')) !!}
                            <p class="red" id="dobError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-building"></i>
                            {!! Form::text('company', null, array('class' => 'form-control','placeholder'=>'Company','id'=>'company')) !!}
                            <p class="red" id="companyError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-phone"></i>
                            {!! Form::text('phone', null, array('class' => 'form-control','placeholder'=>'Phone','id'=>'phone')) !!}
                            <p class="red" id="phoneError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-mobile"></i>
                            {!! Form::text('mobile', null, array('class' => 'form-control','placeholder'=>'Mobile','id'=>'mobile')) !!}
                            <p class="red" id="mobileError"></p>
                        </div>
                     
                        <div class="form-group col-md-9">
                            <i class="fa fa-map-marker"></i>
                            {!! Form::text('address', null, array('class' => 'form-control','placeholder'=>'Address','id'=>'address')) !!}
                            <p class="red" id="addressError"></p>
                        </div>
                        <div class="form-group col-md-9">
                            <i class="fa fa-sticky-note-o"></i>
                            {!! Form::text('notes', null, array('class' => 'form-control','placeholder'=>'notes','id'=>'notes')) !!}
                            <p class="red" id="notesError"></p>
                        </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-right">
            {!! Form::submit('Create', array('class' => 'btn btn-primary submitaddoffer')) !!}
            <a class="btn btn-default btn-close" href="{{ URL::to('contacts') }}">Cancel</a>
            {!! Form::close() !!}
        </div>
    </div>

</script>
@include('adminlte::layouts.contacts.validation')
@endsection