@extends('dashboard.layout')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            @if(Session::has('delete'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('delete') }}</p>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('message.all hotels')}}</h1>
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
                                <table id="example1" class="table table-bordered table-striped container">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>{{__('message.hotel name')}}</th>
                                            <th>{{__('message.stars')}}</th>
                                            <th>{{__('message.description')}}</th>
                                            <th>{{__('message.image')}}</th>
                                            <th>{{__('message.update')}}</th>
                                            <th>{{__('message.delete')}}</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($hotels as $hotel)
                                        <tr>
                                            <td>{{$hotel->id}}</td>
                                            <td><a href="{{url('allrooms/'.$hotel->id)}}">{{$hotel->name}}</a></td>
                                            <td>{{$hotel->stars}}</td>
                                            <td>{{$hotel->description}}</td>
                                            <td><img width="50px" height="50px" src="{{url('image/'.$hotel->image)}}"></td>
                                            <th><a class="btn btn-info btn-sm" href = "{{url('updatehotel/'.$hotel->id)}}">{{__('message.update')}}</th>
                                            <th><a class="btn btn-danger btn-sm" href="{{url('deletehotel/'.$hotel->id)}}">{{__('message.delete')}}</a></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>{{__('message.hotel name')}}</th>
                                            <th>{{__('message.stars')}}</th>
                                            <th>{{__('message.description')}}</th>
                                            <th>{{__('message.image')}}</th>
                                            <th>{{__('message.update')}}</th>
                                            <th>{{__('message.delete')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><div class="d-flex justify-content-center">
                            {{ $hotels->links() }}
                            </div>
                            {{-- <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div> --}}
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


