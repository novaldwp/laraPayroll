@extends('layouts.app')

@section('title')
    Masster
@endsection

@section('breadcrumb')
    <li>Master</li>
    <li class="active">Status Pernikahan</li>
@endsection

@section('content-title')
    <h1>
        {{ $title }}
    </h1>
@endsection

@section('content-body')
    <div class="row">
        <div class="col-md-12 col-xs-12"><!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form id="form-validation" class="form-horizontal" method="POST" action="{{ route('marital.store') }}">
                        @csrf
                        <br>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Nama Status Pernikahan <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Status Pernikahan" class="form-control" autocomplete="off" required/>
                                @if($errors->has('name'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-2 col-md-9">
                                <a href="{{ route('marital.index') }}" class="btn btn-default btn-sm">Kembali</a>
                                <input type="submit" class="btn btn-info btn-sm" value="Submit">
                            </div>
                        </div>

                    </form>
                </div><!-- /.span -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
