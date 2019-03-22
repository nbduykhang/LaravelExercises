@extends('admin.layouts.app1')
@section('page-content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="emailLogin" type="email" autofocus>
                            @if ($errors->has('emailLogin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailLogin') }}</strong>
                                    </span>
                             @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="passwordLogin" type="password" value="">
                            @if ($errors->has('passwordLogin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordLogin') }}</strong>
                                    </span>
                             @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                            <div style="float: right;"><a href="{{ route('getRegister') }}">Register</a></div>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection