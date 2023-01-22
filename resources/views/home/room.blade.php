
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- bootstrap css -->
<link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">
<!-- main css -->
<link rel="stylesheet" href="{{asset('home/css/style.css')}}">

<!-- font awesome -->
<link rel="stylesheet" href="{{asset('home/css/all.css')}}">
    <title>room details</title>
    <style>
    </style>
</head>

<body>


    <section class="about py-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto col-md-6 my-5">
                    <h1 class="text-capitalize">room code<strong class="banner-title ">{{" ".$room->code}}</strong></h1>
                    <h3> price :- {{$room->net_price ." ". $room->currency}}</h3>
                    <h3> taxes :- {{$room->taxes ." ". $room->taxes_type}} </h3>
                    <h3> total :- {{$room->total ." ".$room->currency }}</h3>


                </div>
                <div class="col-10 mx-auto col-md-6 align-self-center my-5">
                    <div class="about-img__container">
                        <img src="{{url('image/'.$room->image)}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>



<section id="store" class="store py-5">
    <div class="container">
      <div class="row">
        <div class="col-10 mx-auto col-sm-6 text-center">
          <h1 class="text-capitalize">room <strong class="banner-title ">images</strong></h1>
        </div>
      </div>
      <div class="row" class="store-items" id="store-items">
    @foreach ($room->roomimg as $img)
      <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
          <div class="card ">
            <div class="img-container">
              <img src="{{url('image/'.$img->room_img)}}" class="card-img-top store-img" alt="">
            </div>
          </div>
        </div>
    @endforeach
    </div>
    </div>
</section>


<script src="{{asset('home/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/js/api.js')}}"></script>
</body>

</html>
