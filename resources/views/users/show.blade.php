{{-- You can change this template using File > Settings > Editor > File and Code Templates > Code > Laravel Ideal Blade View Component --}}
@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card">
                <img src="https://www.gravatar.com/avatar/f70f106decbb9f791d060f819ce38036?s=400" alt="{{$user->name}}" class="card-img-top">
                <div class="card-body">
                    <h5><strong>个人简介</strong></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi dolorem quae! Consequuntur cupiditate earum exercitationem ipsam maiores natus, nemo nulla obcaecati possimus provident quasi quos totam veritatis vitae voluptatem?</p>
                    <hr>
                    <h5><strong>注册于</strong></h5>
                    <p>{{$user->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-0" style="font-size: 22px">{{$user->name}} <small>{{$user->email}}</small></h1>
                </div>
            </div>
            <hr>

            {{--用户发布的内容--}}

            <div class="card">
                <div class="card-body">
                    暂无数据o(╥﹏╥)o
                </div>
            </div>
        </div>
    </div>


@stop
