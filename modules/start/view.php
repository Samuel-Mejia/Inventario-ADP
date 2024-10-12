<style>
  h4 {
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 500;
  }
</style>  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['name_user']; ?></strong> a la aplicación de inventario de productos.
          </p>        
        </div>
      </div>  
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row" style="display: flex; justify-content: space-evenly; margin-top: 10px;">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM medicamentos")
                                            or die('Error '.mysqli_error($mysqli));

           
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Productos creados<br>&nbsp;</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="#" class="small-box-footer" data-toggle="tooltip">&nbsp;</a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
   
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo_transaccion) as numero FROM transaccion_medicamentos")
                                            or die('Error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Movimientos realizados <br>(Entrada/Salida)</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="#" class="small-box-footer" data-toggle="tooltip">&nbsp;</a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM medicamentos")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Productos con stock<br>&nbsp;</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="#" class="small-box-footer" data-toggle="tooltip">&nbsp;</a>
        </div>
      </div><!-- ./col -->

    </div><!-- /.row -->

    <div class="row" style="display: flex; justify-content: space-evenly; margin-top: 12px;">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#6256CA;color:#fff" class="small-box">
          <div class="inner" style="padding-bottom: 60px;">
            <?php   
   
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo_transaccion) as numero FROM transaccion_medicamentos")
                                            or die('Error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>
            <h4>Gestionar <br>de Stock</h4>
          </div>
          <div class="icon">
          <i class="fa fa-table" aria-hidden="true"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=medicines_transaction" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#F3C623;color:#fff" class="small-box">
          <div class="inner" style="padding-bottom: 60px;">
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM medicamentos")
                                            or die('Error '.mysqli_error($mysqli));

           
            $data = mysqli_fetch_assoc($query);
            ?>
            <h4>Crear <br>Producto</h4>
          </div>
          <div class="icon" >
            <i class="fa fa-plus"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=form_medicines&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#229799;color:#fff" class="small-box">
          <div class="inner" style="padding-bottom: 60px;">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM medicamentos")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h4>Historial <br>de Productos</h4>
          </div>
          <div class="icon">
          <i class="fa fa-file-text" aria-hidden="true"></i>

          </div>
          <a href="?module=stock_inventory" class="small-box-footer" title="Imprimir" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->

    </div><!-- /.row -->
  </section><!-- /.content -->