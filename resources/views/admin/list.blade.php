@extends('admin.master')

@section('content');

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Dashboard</h1>
 
                    <a href="/export" class="btn btn-success btn-sm">Export</a>
                    <!-- <span data-href="/export" id="export" class="btn btn-success btn-sm">Export</span> -->
                    <br>
                    <br>
                    <table id="example2" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                            <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Asset Type</th>
                                <th>Asset Code</th>
                                <th>status</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sn=1;
                            @endphp
                            @foreach($csv as $i)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$i->asset_name}}</td>
                                <td>{{$i->assettype_id}}</td>
                                <td>{{$i->asset_code}}</td>
                                @if($i->is_active==true)
                                <td class="text-success">Active</td>
                                @else
                                <td class="text-danger">Inactive</td>
                                @endif

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{$csv->links()}}


                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->



@endsection

