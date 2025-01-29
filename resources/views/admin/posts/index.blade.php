@extends('admin.layout.layout')

@section('title', $title)

@section('content')

    <div id="page-inner">


        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Все посты</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        {{ $post->title }}

                    </div>
                    <div class="panel-body">
                        <p>
                            <small>ID - {{ $post->id }}</small>
                        </p>
                        <p>
                            <small><a href="#">Author - {{ $post->user->name }}</a></small>
                        </p>
                        <p>
                            <small>Created at  - {{ $post->created_at }}</small>
                        </p>
                        <p>
                            <small>Updated at  - {{ $post->updated_at }}</small>
                        </p>

                        <p>{{ $post->content }}</p>

                        <p class="text-left"><a href="#"><small>Читать далее</small></a></p>
                        <p class="text-left"><a href="#"><small>Изменить</small></a></p>
                        <p class="text-left"><a href="#"><small>Удалить</small></a></p>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>

        <!-- /. ROW  -->


@endsection
