@extends('admin.master')

@section('content');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">List Asset </h1>

                    <br>
                    <br>





                    <a href="/create_asset" align="center" class="btn btn-warning">Add Asset </a>
                    <br>
                    <br>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Asset ID</th>
                                <th> Asset Code </th>
                                <th> Asset Name </th>
                                <th> Asset Image </th>
                                <th> Status </th>
                                <th> Asset Type </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                        $sn=1;
                           @endphp
                            @foreach($asset as $as)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$as->asset_code}}</td>
                                <td>{{$as->asset_name}}</td>
                                <td>
                                <img src="{{asset('/uploads/'.$as->asset_image)}}" width=50 height=50 style="border-radius: 50%;">
                                </td>
                                <!-- <td>{{$as->asset_image}}</td> -->
                                @if($as->is_active==true)
                                <td class="text-success">Active</td>
                                @else
                                <td class="text-danger">Inactive</td>
                                @endif
                                <td>{{$as->assettype}}</td>
                                <td>
                                    <!-- <form method="GET" action="{{url('showasset/delete/'.$as->asset_id) }}">
                                        @csrf
                                        
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form> -->

                                    <!-- <a href="showasset/delete/{{$as->asset_id}}" cid="{{$as->asset_id}}" class="btn btn-danger">DELETE</a> -->
                                    <a href="showasset/delete/{{$as->asset_id}}" cid="{{$as->asset_id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>

                                    <a href="showasset/edit/{{$as->asset_id}}" cid="{{$as->asset_id}}" class="btn btn-info">EDIT</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

</div>
@endsection