@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Job</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.job.index') }}">Management Job</a></li>
            <li class="active">Update Data Job</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Update  Data Job</h3>
            </div>
            <form role="form" class="form-horizontal" method="POST" action="{{ route('admin.job.update', $job) }}">
                <div class="box-body">
                    <div class="col-md-12">
                        {{ method_field('PUT') }}
                        @include('admin.job._form')
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.job.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
