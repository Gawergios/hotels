@extends('dashboard.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('addhotel/img')}}" id='form' method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">hotel id</label>
                                        <input type="number" name="hotel_id" class="form-control" id="exampleInputEmail1" placeholder="hotel id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">hotel image</label>
                                        <input type="file" name="hotel_img" class="form-control" id="exampleInputEmail1" placeholder="choose images">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button id='savedata'  class="btn btn-primary">{{__('message.save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

{{-- @section('ajax')
    <script>
        $(document).on('click','#savedata',function(e){
            e.preventDefault();
            var formdata = new FormData($('#form')[0]);

            $.ajax({
                type:"POST",
                enctype:"multipart/form-data",
                url:"{{url('addhotel/img')}}",
                data:formdata,
                cache:false,
                processData:false,
                contentType:false,
            error:function(){

            },
            success:function(data){

            }

            })
        })

    </script>

@endsection --}}
