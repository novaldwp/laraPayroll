@extends('layouts.app')

@section('title')
    Masster
@endsection

@section('breadcrumb')
    <li>Master</li>
    <li class="active">Bank</li>
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
                    <form class="form-horizontal" method="POST" action="{{ URL('master/bank') }}">
                        @csrf
                        <br>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Nama Bank <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" placeholder="Nama Bank" value="{{ old('name') }}" class="form-control" autocomplete="off" required />
                                @if($errors->has('name'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('bank_code') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Kode Bank <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <input type="text" id="bank_code" name="bank_code" placeholder="Kode Bank" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                                @if($errors->has('bank_code'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('bank_code') }}
                                    </em>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-2 col-md-9">
                                <a href="{{ route('bank.index') }}" class="btn btn-default btn-sm">Kembali</a>
                                <input type="submit" class="btn btn-info btn-sm" value="Submit">
                            </div>
                        </div>

                    </form>
                </div><!-- /.span -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
