@extends('layout')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>all rooms</h1>
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
                                            <th>room id</th>
                                            <th>room code</th>
                                            <th>hotel name</th>
                                            <th>hotel id</th>
                                            <th>stars</th>
                                            <th>net price</th>
                                            <th>taxes</th>
                                            <th>taxes type</th>
                                            <th>total</th>
                                            <th>currency</th>
                                            <th>description</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{$room->id}}</td>
                                            <td>{{$room->code}}</td>
                                            <td>{{$room->name}}</td>
                                            <td>{{$room->hotel_id}}</td>
                                            <td>{{$room->stars}}</td>
                                            <td>{{$room->net_price}}</td>
                                            <td>{{$room->taxes}}</td>
                                            <td>{{$room->taxes_type}}</td>
                                            <td>{{$room->total}}</td>
                                            <td>{{$room->currency}}</td>
                                            <td>{{$room->description}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>room id</th>
                                            <th>room code</th>
                                            <th>hotel name</th>
                                            <th>hotel id</th>
                                            <th>stars</th>
                                            <th>net price</th>
                                            <th>taxes</th>
                                            <th>taxes type</th>
                                            <th>total</th>
                                            <th>currency</th>
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
