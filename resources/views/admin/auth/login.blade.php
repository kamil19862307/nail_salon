<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Panel Login Page</title>

    @vite([
        'resources/css/bootstrap.css',
        'resources/css/font-awesome.css'
    ])

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

</head>
<body style="background-color: #E2E2E2;">
<div class="container">
    <div class="row text-center " style="padding-top:100px;">
        <div class="col-md-12">
            <img src="{{ asset('images/admin/milina-logo.png') }}"/>
        </div>
    </div>
    <div class="row ">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="panel-body">
                <form role="form" action="{{ route('admin.signIn') }}" method="post">
                    @csrf

                    <hr/>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5>Enter Details to Login Admin Panel</h5>
                    <br/>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                        <input type="text"
                               name="email"
                               class="form-control"
                               placeholder="Your Email"/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Your Password"/>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox"
                                   name="remember_me"
                                   value="1"/> Remember me
                        </label>
                        <span class="pull-right">
                           <a href="index.html">Forgot password?</a>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary">Login Now</button>
                    <hr/>
                    Not register ? <a href="index.html">click here </a> or go to <a href="index.html">Home</a>
                </form>
            </div>

        </div>


    </div>
</div>

</body>
</html>
