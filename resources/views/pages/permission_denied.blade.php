@extends('layouts.app')

@section('title','无访问权限')

@section('content')

    <div class="col-md-4 col-md-offset-4 m-auto">
        <div class="panel panel-default">
            <div class="panel-body">

                @if(Auth::check())

                    <div class="alert alert-danger text-center">
                        当前账户无访问后台权限
                    </div>

                @else

                    <div class="alert alert-danger text-center">
                        请登陆后再操作
                    </div>

                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary btn-block">
                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 登录
                    </a>

                @endif

            </div>
        </div>
    </div>

@stop
