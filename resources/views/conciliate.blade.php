<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TMC 2.0 | Transacciones</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ url('/') }}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/css/dist/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="content-box">
    <div class="wrapper">

        <div class="login-logo">
            <a href="{{ url('home') }}"><b>TMC</b>2.0</a>
        </div>


        <div class="box">
            <div class="box-header">
                <p>
                <h1>Conciliar Pagos</h1>
                </p>

                <div class="row">
                    <div class="col-lg-5 col-xs-4">
                        <!--<button type="button" class="btn btn-danger btn-block btn-flat" >Regresar</button>-->
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <a href="{{ url('/') }}">
                            <button type="button" class="btn btn-warning btn-block btn-flat">Volver</button>
                        </a>
                    </div>
                    <div class="col-lg-5 col-xs-4">
                        <!--<button type="button" class="btn btn-danger btn-block btn-flat" >Regresar</button>-->
                    </div>
                </div>
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
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="25%">C&oacute;digo Pasarela</th>
                        <th width="5%">C&oacute;digo TMC</th>
                        <th width="15%">Cliente</th>
                        <th width="15%">Concepto</th>
                        <th>ID / Tarjetahabiente</th>
                        <th width="8%">Fecha</th>
                        <th width="5%">Monto(Bs)</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $datas)
                        <tr>
                            <td>
                                <div class="input-group ">
                                    <form name="{{ 'form_'.$datas->pag_id }}" id="{{ 'form_'.$datas->pag_id }}"
                                          method="post" action="{{ url('pagos.conciliate') }}">
                                        {{ csrf_field() }}
                                        <input type="text" class="form-control"
                                               id="{{ 'cod_'.$datas->pag_id }}" name="pag_codigoconciliacion"
                                               required="required">
                                        <input type="hidden" name="pag_id" id="{{ 'pay_'.$datas->pag_id }}"
                                               value="{{ $datas->pag_id }}"/>
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-info btn-flat">Conciliar</button>
                                        </span>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $datas->pag_id }}</td>
                            <td>{{ $datas->usu_nombre }}</td>
                            <td>{{ $datas->pag_concepto }}</td>
                            <td>{{ $datas->pag_cith . ' / ' . $datas->pag_nombretc }}</td>
                            <td>{{ $datas->pag_fechacreacion }}</td>
                            <td>{{ $datas->pag_monto }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--<tfoot>--}}
                    {{--<tr>--}}
                    {{--<th>N&uacute;mero</th>--}}
                    {{--<th>Concepto</th>--}}
                    {{--<th>Cliente</th>--}}
                    {{--<th>Fecha</th>--}}
                    {{--<th>Monto(Bs)</th>--}}
                    {{--</tr>--}}
                    {{--</tfoot>--}}
                </table>
                <form role="form" method="POST" action="{{ URL::route('logout') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">
                        Salir
                    </button>
                </form>

            </div>
        </div>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="{{ url('/') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('/') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{ url('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ url('/') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ url('/') }}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
{{--<script src="{{ url('/') }}/diapp.min.js"></script>--}}
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ url('/') }}/didemo.js"></script>--}}
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
