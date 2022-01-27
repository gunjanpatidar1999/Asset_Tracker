@extends('admin.master')

@section('content');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">Create Asset Type</h1>

                    <br>
                    <br>




                    <form method="POST" action="{{url('/store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Asset Type</label>
                            <input type="text" class="form-control" name="assettype" placeholder="Enter First Name">
                            @if($errors->has('assettype'))
                            <label class="alert alert-danger">{{$errors->first('assettype')}}</label>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Asset Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                            @if($errors->has('description'))
                            <label class="alert alert-danger">{{$errors->first('description')}}</label>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>







                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

</div>
@endsection