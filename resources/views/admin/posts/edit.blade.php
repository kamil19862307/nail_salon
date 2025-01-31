@extends('admin.layout.layout')

@section('title', $title)

@section('content')

    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Изменить пост</h1>
                <h1 class="page-subhead-line">Просмотр, редактирование постов</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Заполните поля
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ route('admin.posts.update', $post) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group @error('title') has-error @enderror">
                                <label>Title</label>
                                <input name="title"
                                       class="form-control"
                                       type="text"
                                       value="{{ old('title', $post->title) }}">
                                @if($errors->has('title'))
                                    <p class="help-block">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group @error('content') has-error @enderror">
                                <label>Content</label>
                                <textarea name="content"
                                          class="form-control"
                                          rows="8">{{ old('title', $post->content) }}</textarea>
                                @if($errors->has('content'))
                                    <p class="help-block">{{ $errors->first('content') }}</p>
                                @endif
                            </div>

                            <x-button type="submit" class="success" name="Сохранить"/>
                            <x-button type="reset" class="danger" name="Отменить"/>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->
    </div>

@endsection
