@extends('admin.master')

@section('content');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">Edit Asset Type</h1>

                    <br>
                    <br>

                    <form method="Post" action='/show/edit/update/{{$assettype->id}}'>
                        @csrf
                        <div class="form-group">
                            <label>Asset Type</label>
                            <input type="text" class="form-control" name="assettype" value="{{$assettype->name}}">
                            @if($errors->has('assettype'))
                            <label class="alert alert-danger">{{$errors->first('assettype')}}</label>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{$assettype->description}}">
                            @if($errors->has('description'))
                            <label class="alert alert-danger">{{$errors->first('description')}}</label>
                            @endif
                        </div >

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>








                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

</div>
@endsection