@extends('dashboard.layout')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">


            {{-- update message --}}
            @if(Session::has('updated'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('updated') }}</p>
            @endif

            {{-- deletion message --}}
            @if(Session::has('delete'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('delete') }}</p>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$hotelname}}</h1>
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
                                            <th>net price</th>
                                            <th>taxes</th>
                                            <th>taxes type</th>
                                            <th>total</th>
                                            <th>currency</th>
                                            <th>image</th>
                                            <th>{{__('message.update')}}</th>
                                            <th>{{__('message.delete')}}</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($rooms as $room)
                                        <tr class="row{{$room->id}}">
                                            <td>{{$room->id}}</td>
                                            <td>{{$room->code}}</td>
                                            <td>{{$room->net_price}}</td>
                                            <td>{{$room->taxes}}</td>
                                            <td>{{$room->taxes_type}}</td>
                                            <td>{{$room->total}}</td>
                                            <td>{{$room->currency}}</td>
                                            <td><img width="100px" height="100px" src="{{url('image/'.$room->image)}}"></td>
                                            <th><a class="btn btn-info btn-sm" href="{{url('updateroom/'.$room->id)}}">{{__('message.update')}}</th>
                                            <th><a class="btn btn-danger btn-sm" href="{{url('deleteroom/'.$room->id)}}">{{__('message.delete')}}</a></th>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>room id</th>
                                            <th>room code</th>
                                            <th>net price</th>
                                            <th>taxes</th>
                                            <th>taxes type</th>
                                            <th>total</th>
                                            <th>currency</th>
                                            <th>image</th>
                                            <th>{{__('message.update')}}</th>
                                            <th>{{__('message.delete')}}</th>

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
