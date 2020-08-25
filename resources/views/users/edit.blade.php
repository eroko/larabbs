{{-- You can change this template using File > Settings > Editor > File and Code Templates > Code > Laravel Ideal Blade View Component --}}
@extends('layouts.app')

@section('title','编辑 '.$user->name.' 的资料')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{route('users.update',$user->id)}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('shared._error')

                        <div class="form-group">
                            <label for="name-field">用户名</label>
                            <input type="text" class="form-control" name="name" id="name-field"
                                   value="{{old('name',$user->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="email-field">邮箱</label>
                            <input type="email" class="form-control" id="email-field" name="email"
                                   value="{{old('email',$user->email)}}">
                        </div>
                        <div class="form-group">
                            <label for="introduction-field"></label>
                            <textarea name="introduction" id="introduction-field" rows="3"
                                      class="form-control">{{ old('introduction',$user->introduction) }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="avatar-label">用户头像</label>
                            <input type="file" name="avatar" class="form-control-file">

                            @if($user->avatar)
                                <br>
                                <img src="{{ $user->avatar }}" alt="" class="thumbnail img-responsive" width="200">
                            @endif

                        </div>

                        <div class="well well-sm">
                            <button class="btn btn-primary" type="submit">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection