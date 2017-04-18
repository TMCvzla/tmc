@if (Auth::guest())
  <?php header("refresh: 0; login"); ?>
@else
@extends('layouts.app')

@section('content')
<!--<div class="login-box">-->
<div class="col-md-8 col-md-offset-2">
  <!-- /.login-logo -->
  <div class="register-logo">
    <a href="#"><b>TMC</b>2.0</a>
  </div>

  <div class="login-box-body">
  <!--$users = Clientes::where('userid', 'Auth::user()->id')->get(['clientesid', 'ci', 'nombre']);-->
  <!--$ci = DB::table('clientes')->where('userid', $userid)->pluck('ci');-->
  
    <p class="login-box-msg">Bienvenido</p>
    <p class="login-box-msg">¡Utiliza nuestro servicio de inmediato!</p>

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
        <input id="nombretc" name="nombretc" type="text" class="form-control" placeholder="Nombre como aparece en la Tarjeta de Cr&eacute;dito">
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
        <input id="cith" name="cith" type="text" class="form-control" placeholder="Cedula del Tarjetahabiente">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <input name="userid" id="userid" type="hidden" value="{{Auth::user()->id}}">
        <input name="estatus" id="estatus" type="hidden" value="0">
      </div>
      <br />
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">

          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->

<!-- Indicadores -->
<div class="box box-solid bg-aqua-gradient">
  <div class="box-header">
    <i class="fa fa-th"></i>
    <h3 class="box-title">Resumen de tu Cuenta</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <!--<h3>12</h3>-->
              <br>
              <p>Por Procesar</p>
            </div>
            <div class="icon">
              <i class="ion ion-search"></i>
            </div>
            <a href="transactions/0" class="small-box-footer">Ver m&aacute;s <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <!--<h3>53<sup style="font-size: 20px"></sup></h3>-->
              <br>
              <p>Procesados</p>
            </div>
            <div class="icon">
              <i class="ion ion-compose"></i>
            </div>
            <a href="transactions/1" class="small-box-footer">Ver m&aacute;s <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <!--<h3>44</h3>-->
              <br>

              <p>Facturados</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <a href="transactions/2" class="small-box-footer">Ver m&aacute;s <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

</div>
<!-- /.login-box -->



</div>
<!-- Indicadores -->

  


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