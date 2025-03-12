@extends('admin.layout.layout')

@section('title', $title)

@section('content')

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Редактирование пользоввателя</h1>
            <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    File Uploads
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="control-label col-lg-4">Предварительный просмотр</label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{ asset('storage/images/admin/avatars/' . $user->avatar) }}" alt="" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary">
                                            <input type="file" name="avatar">
                                            <span class="fileupload-new">Выбрать картинку</span>
                                            <span class="fileupload-exists">Поменять</span>
                                            </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @error('name') has-error @enderror">
                            <label>Имя</label>
                            <input class="form-control" type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}">
                            @if($errors->has('name'))
                                <p class="help-block">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>Email</label>
                            <input class="form-control" type="text"
                               name="email"
                               value="{{ old('email', $user->email) }}">
                            @if($errors->has('email'))
                                <p class="help-block">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group @error('old_password') has-error @enderror">
                            <label>Текущий пароль</label>
                            <input class="form-control" type="password"
                                name="old_password">
                            @if($errors->has('old_password'))
                                <p class="help-block">{{ $errors->first('old_password') }}</p>
                            @endif
                        </div>
                        <div class="form-group @error('password') has-error @enderror">
                            <label>Новый пароль</label>
                            <input class="form-control" type="password"
                                name="password">
                            @if($errors->has('password'))
                                <p class="help-block">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group @error('password_confirmation') has-error @enderror">
                            <label>Подтверждение нового пароля</label>
                            <input class="form-control" type="password"
                                name="password_confirmation">
                            @if($errors->has('password_confirmation'))
                                <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Сохранить</button>
                        <button type="reset" class="btn btn-danger">Сбросить</button>

                    </form>


                    </div>
            </div>




        </div>

    </div>

</div>

@endsection
