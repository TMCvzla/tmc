@if (Auth::guest())
    <?php header("refresh: 0; login"); ?>
@else
    @extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <!-- /.login-logo -->
        <div class="register-logo">
            <a href="{{ url('home') }}"><b>TMC</b>2.0</a>
        </div>

        <div class="login-box-body">
            {{--<h1>Bienvenido--}}
            {{--<small>¡Utiliza nuestro servicio de inmediato!</small>--}}
            {{--</h1>--}}
            <p>
            <h1>Facturar</h1>
            </p>
            <br/>
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="alert alert-{{ $msg }}" data-dismiss="alert">
                                <span class="glyphicon glyphicon-ok"></span> {{ Session::get('alert-' . $msg) }}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        @endif
                    @endforeach
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                </div>
            </div>
            <form action="{{ url('pagos.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input id="monto" name="monto" type="text" class="form-control" placeholder="Monto">
                    <span class="glyphicon fa-money form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input id="concepto" name="concepto" type="text" class="form-control" placeholder="Concepto">
                    <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input id="nombretc" name="nombretc" type="text" class="form-control"
                           placeholder="Nombre como aparece en la Tarjeta de Cr&eacute;dito">
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>

                <div class="input-group">
                    <div class="input-group-addon">
                        <select name="cipre" id="cipre">
                            <option selected value="V">V</option>
                            <option value="J">J</option>
                            <option value="P">P</option>
                            <option value="G">G</option>
                        </select>
                    </div>
                    <input id="cith" name="cith" type="text" class="form-control"
                           placeholder="Cedula del Tarjetahabiente">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <br/>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->

        <!-- /.login-box -->
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

@endsection
@endif
