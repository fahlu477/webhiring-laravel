@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Program Study</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.program_study.index') }}">Management Program Study</a></li>
            <li class="active">Create Data Program Study</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Data Program Study</h3>
            </div>
            <form role="form" class="form-horizontal" method="POST" action="{{ route('admin.program_study.store') }}">
                <div class="box-body">
                    <div class="col-md-12">
                        @include('admin.program_study._form')
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.program_study.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
