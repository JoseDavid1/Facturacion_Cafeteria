  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de bebidas para la carta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Menú</li>
              <li class="breadcrumb-item active">Ingreso Bebidas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
              </div>
              <!-- /.card-header -->
              
                <div class="card-body">
                  <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de la bebida</label>
                    <input type="text" class="form-control" name="nom_bebidas" placeholder="Ingrese texto..." required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <input type="text" class="form-control" name="desc_bebidas" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ingredientes</label>
                    <input type="text" class="form-control" name="ingred_bebidas" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Costo de la bebida</label>
                        <input type="text" class="form-control" name="costo_bebidas" placeholder="Costo del Platillo">
                      </div>
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Precio de Venta</label>
                        <input type="text" class="form-control" name="venta_bebidas" placeholder="Precio de venta">
                      </div>
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirImgbebidas">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Imagen</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
                        <div class="col-md-8">
                          <img class="previsualizarImgbebida img-fluid py-2" width='400' height='400'>
                          <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                      <div class="col-md-1"></div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-block bg-gradient-primary">Guardar</button>
                </div>
                <?php 

                    $guardarbebidas = new ctrBebidas();
                    $guardarbebidas->ctrGuardarBebidas();

                ?>
              </form>
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col-12 -->
            <div class="col-2"></div>
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container -->
</section>
<!-- /.section -->

<br><br><br><br>


        
      <div class="container-fluid">
        <div class="row">            
          <div class="col-12">
                          <!-- general form elements -->
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Visualización de Bebidas</h3>
                              <div class="card-tools">
                                          <!-- Collapse Button -->
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            

              <table class="table table-bordered table-striped dt-responsive tablaBebidas" width="100%" id="tablaBebidas">

                  <thead>

                      <tr>

                          <th style="width:10px">#</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Ingredientes</th>
                          <th>Costo Platillo</th>
                          <th>Precio Venta</th>
                          <th>Foto</th>
                          <th>Acciones</th>



                      </tr>

                  </thead>

                  <tbody>

                  <?php  ?>



              <?php 
              foreach($bebidas as $key => $value){                  
                  
              ?>

                      <tr>

                      <td><?php echo $value["idBebida"]  ?></td>
                      <td><?php echo $value["nombreBebida"]  ?></td>
                      <td><?php echo $value["descripcionBebida"]  ?></td>
                      <td><?php echo $value["ingredientesBebida"]  ?></td>
                      <td><?php echo $value["precio_costoBebida"]  ?></td>
                      <td><?php echo $value["precio_ventaBebida"]  ?></td>
                      <td><img src="<?php echo $value["fotoBebida"]  ?>" width="40" height="40"></td>

                          <td>

                              <div class='btn-group'>

                                  <button class="btn btn-warning btn-sm btnEditarBebida"
                                          data-toggle="modal" idBebida="<?php echo $value["idBebida"]  ?>"
                                          data-target="#modal-editar-bebidas">
                                      <i><ion-icon name="pencil-outline"></ion-icon></i>
                                  </button>

                                  <button class="btn btn-danger btn-sm eliminarBebida"
                                          idBebidaE="<?php echo $value["idBebida"]  ?>"
                                          rutaFoto="<?php echo $value["fotoBebida"]  ?>">
                                      <i><ion-icon name="trash-outline"></ion-icon></i>
                                  </button>

                              </div>

                          </td>

                      </tr>


                      <?php 

              }

              ?>


                  </tbody>

              </table>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                      
              </div>
              <!-- /.card-footer-->
                          </div>
                          <!-- /.card -->
                          </div>
                          <!-- /.col-12 -->
                      </div>
                      <!-- /.row -->
                </div>
                <!-- /.content -->







<!--=====================================
Modal Editar platillos
======================================-->
<!-- Modal -->
<div class="modal fade" id="modal-editar-bebidas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edición de Platillo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del platillo</label>
                    <input type="hidden" id="idBebidaE" name="idBebidaE">
                    <input type="text" class="form-control" name="nom_bebidaE" id="nom_bebidaE" placeholder="Ingrese texto..." required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <input type="text" class="form-control" name="desc_bebidaE" id="desc_bebidaE" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ingredientes</label>
                    <input type="text" class="form-control" name="ingred_bebidaE" id="ingred_bebidaE" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Costo del platillo</label>
                        <input type="text" class="form-control" name="costo_bebidaE" id="costo_bebidaE" placeholder="Costo del Platillo">
                      </div>
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Precio de Venta</label>
                        <input type="text" class="form-control" name="venta_bebidaE" id="venta_bebidaE" placeholder="Precio de venta">
                      </div>
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirImgbebidaE">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Imagen</label>
                      </div>
                      <input type="hidden" id="fotoActualBE" name="fotoActualBE">
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-8">
                    <img class="previsualizarImgbebida img-fluid py-2" width='400' height='400'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>
                    <div class="col-md-1"></div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                <?php 

                $editarbebidas = new ctrBebidas();
                $editarbebidas->ctrEditarbebidas();
                
                
                ?>
              </form>
                
    </div>
  </div>
</div>                

<!-- </div> -->
<!-- /.wrapper -->