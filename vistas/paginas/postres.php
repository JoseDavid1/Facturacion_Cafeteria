  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Postres para la carta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Menú</li>
              <li class="breadcrumb-item active">Ingreso Postres</li>
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
                    <label for="exampleInputEmail1">Nombre del postre</label>
                    <input type="text" class="form-control" name="nom_postres" placeholder="Ingrese texto..." required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <input type="text" class="form-control" name="desc_postres" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ingredientes</label>
                    <input type="text" class="form-control" name="ingred_postres" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Costo del postre</label>
                        <input type="text" class="form-control" name="costo_postre" placeholder="Costo del Platillo">
                      </div>
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Precio de Venta</label>
                        <input type="text" class="form-control" name="venta_postre" placeholder="Precio de venta">
                      </div>
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirImgpostres">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Imagen</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Cargar</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
                        <div class="col-md-8">
                          <img class="previsualizarImgpostres img-fluid py-2" width='400' height='400'>
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
                  $guardarpostres = new ctrPostres();
                  $guardarpostres->ctrGuardarPostres();
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
                              <h3 class="card-title">Visualización de Postres</h3>
                              <div class="card-tools">
                                          <!-- Collapse Button -->
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            

              <table class="table table-bordered table-striped dt-responsive tablaPostres" width="100%" id="tablaPostres">

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
              foreach($postres as $key => $value){
                                    
              ?>

                      <tr>

                      <td><?php echo $value["idPostre"]  ?></td>
                      <td><?php echo $value["nombrePostre"]  ?></td>
                      <td><?php echo $value["descripcionPostre"]  ?></td>
                      <td><?php echo $value["ingredientesPostre"]  ?></td>
                      <td><?php echo $value["precio_costoPostre"]  ?></td>
                      <td><?php echo $value["precio_ventaPostre"]  ?></td>
                      <td><img src="<?php echo $value["fotoPostre"]  ?>" width="40" height="40"></td>

                          <td>

                              <div class='btn-group'>

                                  <button class="btn btn-warning btn-sm btnEditarPostre"
                                          data-toggle="modal" idPostre="<?php echo $value["idPostre"]  ?>"
                                          data-target="#modal-editar-postres">
                                      <i><ion-icon name="pencil-outline"></ion-icon></i>
                                  </button>

                                  <button class="btn btn-danger btn-sm eliminarPostre"
                                          idPostreE="<?php echo $value["idPostre"]  ?>"
                                          rutaFoto="<?php echo $value["fotoPostre"]  ?>">
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
<div class="modal fade" id="modal-editar-postres" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edición de Postres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del postre</label>
                    <input type="hidden" id="idPostreE" name="idPostreE">
                    <input type="text" class="form-control" name="nom_postresE" id="nom_postresE" placeholder="Ingrese texto..." required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <input type="text" class="form-control" name="desc_postresE" id="desc_postresE" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ingredientes</label>
                    <input type="text" class="form-control" name="ingred_postresE" id="ingred_postresE" placeholder="Ingrese texto...">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Costo del platillo</label>
                        <input type="text" class="form-control" name="costo_postresE" id="costo_postresE" placeholder="Costo del Platillo">
                      </div>
                      <div class="col-sm-6">
                        <label for="exampleInputPassword1">Precio de Venta</label>
                        <input type="text" class="form-control" name="venta_postresE" id="venta_postresE" placeholder="Precio de venta">
                      </div>
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirImgpostresE">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Imagen</label>
                      </div>
                      <input type="hidden" id="fotoActualPTE" name="fotoActualPTE">
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-8">
                    <img class="previsualizarImgpostres img-fluid py-2" width='400' height='400'>
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

                $editarpostres = new ctrPostres();
                $editarpostres->ctrEditarpostres();
                
                
                ?>
              </form>
                
    </div>
  </div>
</div>



<!-- </div> -->
<!-- /.wrapper -->