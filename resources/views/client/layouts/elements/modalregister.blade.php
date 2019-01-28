<div class="subscribe-newsletter-area">
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <h5 class="title">Register</h5>
                    {!! Form::open(['route' => 'register','id'=>'modalregister', 'method'=>'POST']) !!}
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
                        {!! Form::password('password', ['id'=>'password','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group has-feedback">
                        <span class="fa fa-lock form-control-feedback"></span>
                        {!! Form::label('label1', 'Retype password', ['class' => 'control-label']) !!}
                        {!! Form::password('confirmpassword', ['class' => 'form-control']) !!}
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
                                    {!! Form::checkbox('name', 'value') !!}
                                    I agree to Blog Terms of Service
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
                </div>
            </div>
        </div>
    </div>
</div>
