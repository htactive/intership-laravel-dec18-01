<div class="subscribe-newsletter-area">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <h5 class="title">Register</h5>
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
                        <span class="fa fa-lock form-control-feedback"></span>
                        {!! Form::label('label1', 'Password', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            {{ Form::button('Login',['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat'] )}}
                        </div>
                        <!-- /.col -->
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
