<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/iCheck/square/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="margin:1% auto">
  <div class="register-logo">
    <b>Register</b>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      {!! Form::open(['route' => 'users.store']) !!}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif
        <div class="form-group has-feedback">
            <span class="fa fa-user form-control-feedback"></span>
            {!! Form::label('label1', 'Username', ['class' => 'control-label']) !!}
            {!! Form::text('username', '', ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-user form-control-feedback"></span>
            {!! Form::label('label1', 'Display Name', ['class' => 'control-label']) !!}
            {!! Form::text('displayname', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            {!! Form::label('label1', 'Password', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            {!! Form::label('label1', 'Retype password', ['class' => 'control-label']) !!}
            {!! Form::password('retypepassword', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-envelope form-control-feedback"></span>
            {!! Form::label('label1', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', '', ['class' => 'form-control']) !!}
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
                {{ Form::button('Register',['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat'] )}}
          </div>
          <!-- /.col -->
        </div>
        {!! Form::close() !!}

      <a href="#" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('backend/plugins/iCheck/icheck.min.js')}}"></script>
</body>
</html>
