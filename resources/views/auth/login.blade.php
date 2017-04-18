@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicia sesi&oacute;n</div>
                <div class="panel-body">
                    <form  role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <!--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">-->
                            <!--
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            -->

                            <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!--</div>-->

                        <!--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            -->

                            <div class="form-group has-feedback">
                                <!--
                                <input id="password" type="password" class="form-control" name="password" required>
                                -->
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!--</div>-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-0">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-0">
                                <a href="{{ url('/password/reset') }}">Olvid&eacute; mi contrase&ntilde;a</a><br>
                                <a  href="{{ url('/register') }}" class="text-center">Registrate ahora</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
