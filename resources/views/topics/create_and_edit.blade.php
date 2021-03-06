@extends('layouts.app')

@section('title',isset($topic->id)?'编辑话题':'新建话题')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor-dropzone.js') }}"></script>

    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#editor'),
                upload:{
                    url:'{{ route('topics.upload_image') }}',
                    params:{
                        _token:'{{ csrf_token() }}',
                    },
                    fileKsy:'upload_file',
                    connectionCount:3,
                    leaveConfirm:'图片上传中，关闭此页面将取消上传。'
                },
                pasteImage:true,
            })
        })
    </script>
@stop

@section('content')

    <div class="container">
        <div class="col-md-10 offset-md-1">
            <div class="card">

                <div class="card-body">

                    <h2 class="">
                        <i class="far fa-edit"></i>
                        @if($topic->id)
                            编辑话题
                        @else
                            新建话题
                        @endif
                    </h2>

                    <hr>

                    @if($topic->id)
                        <form action="{{ route('topics.update',$topic->id) }}" method="post" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                            @else
                                <form action="{{ route('topics.store') }}" method="post" accept-charset="UTF-8">
                                    @endif
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    @include('shared._error')

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title',$topic->title) }}" placeholder="请输入标题" required>
                                    </div>

                                    <div class="form-group">
                                        <select name="category_id" id="" class="form-control" required>
                                            <option value="" hidden disabled {{ $topic->id?'':'selected'}} >请选择分类</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                <textarea name="body" id="editor" rows="6" class="form-control" placeholder="内容至少3个字符"
                                          required>{{ old('body',$topic->body) }}</textarea>
                                    </div>

                                    <div class="well well-sm">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="far fa-save mr-2" aria-hidden="true"> 保存</i>
                                        </button>
                                    </div>

                                </form>


                </div>
            </div>
        </div>
    </div>


@endsection
