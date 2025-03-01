@extends('admin.layout.layout')

@section('title', $title)

@section('content')

    <div id="page-inner">


        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Все посты</h1>
                <h1 class="page-subhead-line">
                    @if(session('success'))
                        {{ session('success') }}
                    @endif
                </h1>

            </div>
        </div>
        <!-- /. ROW  -->
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        {{ $post->title }}

                        @if($post->fresh)
                            <i class="fa fa-star" aria-hidden="true" style="color: red;"></i> Свежая новость
                        @endif

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

                        @can('update', $post)
                            <p class="text-left"><a href="{{ route('admin.posts.edit', $post) }}"><small>Изменить</small></a></p>
                        @endcan

                        @can('delete', $post)
                            <p class="text-left">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </p>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>

        <!-- /. ROW  -->


@endsection
