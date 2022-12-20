@extends('layout')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>all hotels</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>hotel name</th>
                                            <th>stars</th>
                                            <th>description</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($hotels as $hotel)
                                        <tr>
                                            <td>{{$hotel->id}}</td>
                                            <td>{{$hotel->name}}</td>
                                            <td>{{$hotel->stars}}</td>
                                            <td>{{$hotel->description}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th> name</th>
                                            <th>stars</th>
                                            <th>description</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
