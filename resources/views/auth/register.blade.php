@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Registrese</div>
                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group has-feedback">
                                <!--
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                -->
                                    <input id="name" name="name" type="text" class="form-control" maxlength="100"
                                           placeholder="Nombre Apellido o Raz&oacute;n Social" required autofocus>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <select name="cipre" id="cipre">
                                            <option selected value="V">V</option>
                                            <option value="J">J</option>
                                            <option value="P">P</option>
                                            <option value="G">G</option>
                                        </select>
                                    </div>
                                    <input name="ci" id="ci" type="text" class="form-control" maxlength="10"
                                           placeholder="Documento de Identidad">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                                <div class="form-group has-feedback">
                                    <input id="email" type="email" class="form-control" name="email" maxlength="80"
                                           value="{{ old('email') }}" placeholder="Email" required>

                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <input name="dirfiscal" id="dirfiscal" type="text" class="form-control" maxlength="100"
                                       placeholder="Direcci&oacute;n Fiscal">
                                <span class="glyphicon glyphicon-print form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dirfiscal') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input name="direnvio" id="direnvio" type="text" class="form-control" maxlength="100"
                                       placeholder="Direcci&oacute;n de Env&iacute;o">
                                <span class="glyphicon glyphicon-send form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('direnvio') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <select name="banco" id="banco" class="form-control" placeholder="Banco">
                                    <option selected value="0">Seleccione un Banco</option>
                                    <option value="1">Banco Mercantil</option>
                                    <option value="2">Banco Venezolano de Cr&eacute;dito</option>
                                    <option value="3">Banco de Venezuela</option>
                                    <option value="1">Banesco</option>
                                    <option value="1">Banco Exterior</option>
                                </select>
                                @if ($errors->has('banco'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('direnvio') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input name="cuenta" id="cuenta" type="text" class="form-control"
                                       placeholder="N° Cuenta" maxlength="20">
                                <span class="glyphicon glyphicon-option-horizontal form-control-feedback"></span>
                                @if ($errors->has('cuenta'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('direnvio') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <select name="tipocuenta" id="tipocuenta" class="form-control" placeholder="Banco">
                                    <option selected value="0">Seleccione un Tipo de Cuenta</option>
                                    <option value="1">Ahorro</option>
                                    <option value="2">Corriente</option>
                                </select>
                                @if ($errors->has('tipocuenta'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('direnvio') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="form-group has-feedback">
                                    <input id="password" type="password" class="form-control" name="password"
                                           maxlength="20"
                                           placeholder="Password" required>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <!--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>-->

                                <div class="form-group has-feedback">
                                    <input id="password-confirm" type="password" class="form-control" maxlength="20"
                                           name="password_confirmation" placeholder="Retype password" required>
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox">
                                            <a href="#">Terminos y condiciones</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default" onclick="history.back()">Cancelar</button>

                            <button type="submit" class="btn btn-primary pull-right">
                                Registro
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
