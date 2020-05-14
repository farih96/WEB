@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<!--  -->
@section('content')


    <div class="box-container img-container">

        <div class="info-img">
            <div>{{$item->title}}</div>
            <hr>
        </div>

        @foreach ($item_photos as $item_photo)

            <img src="{{asset('storage/'.$item_photo->photo_path)}}" width="200px" height="250px">
            

        @endforeach


        <div class="link">
            {{$item_photos->links()}}
        </div>
        <hr>
        <div class="desc">{{$item->description}}</div>
    </div>

    <div class="img-container info-container">

            <img src="{{asset('storage/'.$user->picture)}}" style="width: 150px; height:150px; border-radius:50%;">
            <hr>
            <div><i class="fas fa-user" style="margin-right: 10px"></i>{{$user->name}}</div>
            <div><i class="fas fa-map-marker" style="margin-right: 10px"></i>{{$user->city}} , {{$user->adresse}}</div>
            <div><i class="fas fa-phone" style="margin-right: 10px"></i></i>{{$user->phone}}</div>
            <div><i class="fas fa-envelope-open-text" style="margin-right: 10px"></i>{{$user->email}}</div>

            <button type="button" class="center btn btn-success">Chat</button>        
            </div>
    </div>

    <div class="price-container">
        <div style="font-size:1.5em"><a href="#"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px"></i></a>Make it your favorite</div>
        <hr>
        <div style="font-size:1.5em"><i class="fas fa-dollar-sign" style="margin-right: 10px;"></i>{{$item->price}}</div>
    </div>


    <form id="checkoutform" action="{{ url('Reservation') }}" method="POST" >

        <input type="text" name="date_start" id="start">
        <input type="text" name="date_end" id="end">
        <input type="text" name="total_price">
        <input type="hidden" name="item_id" value="{{$item->id}}">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection