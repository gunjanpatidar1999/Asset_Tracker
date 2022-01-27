@extends('admin.master')

@section('content');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">Create Asset</h1>

                    <br>
                    <br>




                    <form method="POST" action="{{url('/store_asset')}}" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('errormsg'))
                        <div class="alert alert-danger">{{Session::get('errormsg')}}</div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        <div class="form-group">
                            <label>Asset Name</label>
                            <input type="text" class="form-control" name="assetname" placeholder="Enter First Name">
                            @if($errors->has('assetname'))
                            <label class="alert alert-danger">{{$errors->first('assetname')}}</label>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Asset Code</label>
                            <textarea name="assetcode" class="form-control" placeholder="Enter Description"></textarea>
                            @if($errors->has('assetcode'))
                            <label class="alert alert-danger">{{$errors->first('assetcode')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="dropdown">
                                <label>Asset Type</label>
                                <select name="assettype" class="form-control">
                                    @foreach($asset_data as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('assettype'))
                                <label class="alert alert-danger">{{$errors->first('assettype')}}</label>
                                @endif

                            </div>
                        </div>


                        <div class="form-group">
                            <label>Asset Image</label>
                            <input type="file" name="assetimage" class="form-control">
                            @if($errors->has('assetimage'))
                            <label class="alert alert-danger">{{$errors->first('assetimage')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label> &nbsp; &nbsp;
                            <input type="radio" name="isactive" value="1" checked> Active &nbsp;
                            <input type="radio" name="isactive" value="0"> Inactive
                            @if($errors->has('isactive'))
                            <label class="alert alert-danger">{{$errors->first('isactive')}}</label>
                            @endif

                        </div>




                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>







                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

</div>
@endsection