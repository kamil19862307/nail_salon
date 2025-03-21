@extends('admin.layout.layout')

@section('title', $title)

@section('content')

    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Создать пост</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
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
                        <form role="form" action="{{ route('admin.posts.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group @error('title') has-error @enderror">
                                <label>Title</label>
                                <input name="title" class="form-control" type="text">
                                @if($errors->has('title'))
                                    <p class="help-block">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group @error('content') has-error @enderror">
                                <label>Text area</label>
                                <textarea name="content" class="form-control" rows="8"></textarea>
                                @if($errors->has('content'))
                                    <p class="help-block">{{ $errors->first('content') }}</p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-info">Send Message </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->
    </div>

@endsection
