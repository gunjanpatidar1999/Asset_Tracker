@extends('admin.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">Edit Asset </h1>

                    <br>
                    <br>
                    <form method="post" action="/showasset/edit/update/{{$catdata->asset_id}}" enctype="multipart/form-data">
                        @csrf()
                        @if(Session::has('errormsg'))
                        <div class="alert alert-danger">{{Session::get('errormsg')}}</div>
                        @endif
                        <div class="form-group">
                            <label>Asset Name </label>
                            <input type="text" class="form-control" name="asset_name" value="{{ $catdata->asset_name}}" />
                            @if($errors->has('asset_name'))
                            <br><span class="alert alert-danger" role="alert">{{$errors->first('asset_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Asset Code </label>
                            <input type="text" class="form-control" name="asset_code" value="{{ $catdata->asset_code}}" />
                            @if($errors->has('code'))
                            <div class="alert alert-danger">{{$errors->first('code')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Asset Type</label>
                            <select class="form-control" name="type">
                                <option value=""> Select </option>
                                @foreach($data as $catname)
                                <option value="{{$catname->id}}">{{$catname->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type')) <div class="alert alert-danger">{{$errors->first('type')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Asset Image </label>
                            <input type="file" class="form-contol" name="images" />
                            @if($errors->has('images'))<div class="alert alert-danger">{{$errors->first('images')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Is Active </label><br>
                            &nbsp;<input type="radio" name="radio" id="yes" value="1" checked>
                            <label for="yes">Yes</label>&nbsp;&nbsp;
                            <input type="radio" name="radio" id="no" value="0">
                            <label for="no">No</label>
                        </div>
                        <input type="hidden" value="{{$catdata->id}}" name="id" />
                        <input type="submit" value="Update" class="btn btn-success" />
                    </form>


                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

</div>
@endsection