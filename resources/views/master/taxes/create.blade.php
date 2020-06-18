@extends('layouts.app')

@section('title')
    Masster
@endsection

@section('breadcrumb')
    <li>Master</li>
    <li class="active">Perpajakan</li>
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
                    <form id="form-validation" class="form-horizontal" method="POST" action="{{ route('taxes.store') }}">
                        @csrf
                        <br>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Nama Golongan Pajak <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Golongan Pajak" class="form-control" autocomplete="off" required/>
                                @if($errors->has('name'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Nominal <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <input type="text" id="value" name="value" value="{{ old('value') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Nominal Pajak" class="form-control" autocomplete="off" required/>
                                @if($errors->has('value'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('value') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('marital_id') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label no-padding-right">
                                Status Pernikahan <i class="light-red ace-icon fa fa-asterisk"></i>
                            </label>

                            <div class="col-sm-9">
                                <select name="marital_id" id="marital" class="form-control" required>
                                    <option selected disabled>-- Pilih Status Pernikahan --</option>
                                    @if (count($marital))
                                    @foreach($marital as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == old('marital_id') ? "selected": "" }}>{{ $row->name }}</option>
                                    @endforeach
                                    @else
                                        <option>Tidak ada data.</option>
                                    @endif
                                </select>
                                @if($errors->has('marital_id'))
                                    <em class="invalid-feedback red">
                                        {{ $errors->first('marital_id') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right">
                                Keterangan
                            </label>

                            <div class="col-sm-9">
                                <textarea name="description" id="description" class="form-control" plaaceholder="Keterangan" cols="10" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-2 col-md-9">
                                <a href="{{ route('taxes.index') }}" class="btn btn-default btn-sm">Kembali</a>
                                <input type="submit" class="btn btn-info btn-sm" value="Submit">
                            </div>
                        </div>

                    </form>
                </div><!-- /.span -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
