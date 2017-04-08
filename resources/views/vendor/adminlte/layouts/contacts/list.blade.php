@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('message.contacts') }}
@endsection

@section('contentheader_title')
{{ trans('message.contacts') }}
@endsection
@section('main-content')

<div id="datatable1_wrapper" class="dataTables_wrapper form-inline" role="grid">
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{!! Session::get('error') !!}</div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success">{!! Session::get('success') !!}</div>
    @endif

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('message.contactlist') }}</h3>
             <div class="box-tools pull-right">
                <a href="{{ url('contacts/create') }}" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-plus"> </span> {{ trans('message.contactsadd') }}</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped responsive dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    $i = 0;
                                    foreach ($data as $offer) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $offer['name'] ?></td>
                                            <td><?= $offer['email'] ?></td>
                                            <td><?php 

                                            $date_of_birth = $offer['dob'];
                                            $today_date = date("Y-m-d");

                                            $diff = abs(strtotime($date_of_birth) - strtotime($today_date));
                                            $years = floor($diff / (365*60*60*24));
                                            echo $years;
                                            ?></td>
                                            <td><?= $offer['company'] ?></td>
                                            <td>
                                                <a href="<?= url('contacts/modify/' . $offer['id']); ?>" class="btn btn-success btn-sm" title='Edit outlets location'><i class="fa fa-pencil"></i></a>
                                                <a href="<?= url('contacts/delete/' . $offer['id']); ?>" class="btn btn-warning btn-sm" title='Edit outlets timing'><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <h3>
                                                <a href="{{ url('contacts/create') }}">
                                                    Click Here
                                                </a>
                                                to add your first contact
                                            </h3>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>  
                </div>

            </div>
            <!-- /.row -->
        </div>

    </div>
</div>
@endsection