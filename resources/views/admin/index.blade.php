@extends('admin.master')

@section('content');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">List Asset Type</h1>

                    <br>
                    <br>





                    <a href="/create_asset_type" align="center" class="btn btn-warning">Add Asset Type</a>
                    <br>
                    <br>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th> ID</th>
                                <th> Asset Type </th>
                                <th> Asset Description </th>
                                <th> Actions </td>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                        $sn=1;
                           @endphp
                            @foreach($assettype as $asset)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$asset->name}}</td>
                                <td>{{$asset->description}}</td>
                                <td>

                                <a href="show/delete/{{$asset->id}}" cid="{{$asset->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    
                                <!-- <form method="GET" action="{{url('show/delete/'.$asset->id) }}">
                                        @csrf
                                        
                                        <button class="btn btn-danger" type="submit" >Delete</button>
                                    </form> -->
                                    <a href="show/edit/{{$asset->id}}" cid="{{$asset->id}}" class="btn btn-info">EDIT</a>
                                    <!-- <form method="GET" action="{{url('show/edit/'.$asset->id) }}">
                                        @csrf

                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form> -->
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