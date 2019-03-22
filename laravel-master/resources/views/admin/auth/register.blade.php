@extends('admin.layouts.app1')

@section('page-content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign Up</h3>
            </div>
        	<div class="panel-body">
	            <form role="form" method="POST">
	            	@csrf
	                <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="First Name" name="firstnameRegister" type="text" autofocus>
                             @if ($errors->has('firstnameRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstnameRegister') }}</strong>
                                    </span>
                             @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Last Name" name="lastnameRegister" type="text" autofocus>
                             @if ($errors->has('lastnameRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastnameRegister') }}</strong>
                                    </span>
                             @endif
                        </div>
						<div class="form-group">
	                        <input class="form-control" placeholder="Username" name="usernameRegister" type="text" autofocus>
	                         @if ($errors->has('usernameRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usernameRegister') }}</strong>
                                    </span>
                             @endif
	                    </div>
	                    <div class="form-group">
	                        <input class="form-control" placeholder="E-mail" name="emailRegister" type="email" autofocus>
	                        @if ($errors->has('emailRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailRegister') }}</strong>
                                    </span>
                             @endif
	                    </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Phone Number" name="phoneRegister" type="text" autofocus>
                            @if ($errors->has('phoneRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneRegister') }}</strong>
                                    </span>
                             @endif
                        </div>
	                    <div class="form-group">
	                        <input class="form-control" placeholder="Password" name="passwordRegister" type="password" value="">
	                        @if ($errors->has('passwordRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordRegister') }}</strong>
                                    </span>
                             @endif
	                    </div>
						<div class="form-group">
	                        <input class="form-control" placeholder="Confirm Password" name="repasswordRegister" type="password" value="" required>
	                        @if ($errors->has('repasswordRegister'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('repasswordRegister') }}</strong>
                                    </span>
                             @endif
	                    </div>
	                    <!-- Change this to a button or input when using this as a form -->
	                    <button class="btn btn-lg btn-success btn-block" type="submit">Sign Up</button>
	                </fieldset>
	            </form>
        	</div>
        </div>
    </div>
</div>
@endsection
