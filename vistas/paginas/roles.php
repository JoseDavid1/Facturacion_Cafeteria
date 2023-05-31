  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Manejo de Usuarios</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Manejo de roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
      <section class="content">
            <div class="container-fluid">
              <div class="row">            
                  <div class="col-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Registro de Roles</h3>
                      <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                    <table class="table table-bordered table-striped dt-responsive tablaRoles" width="100%" id="tablaRoles">
                      <button type="button" class="btn btn-success crear-rol" data-toggle="modal"
                                      data-target="#modal-crear-roles">
                                      Crear Nuevo Rol
                      </button><br><br>
                      <thead>

                          <tr>

                          <th style="width:10px">#</th>
                          <th>Nombre del Rol</th>
                          <th>Acciones</th>



                          </tr>

                      </thead>

                      <tbody>

        <?php  ?>

        <?php 

          foreach($roles as $key => $value){                                    
                                      
        ?>

        <tr>

            <td><?php echo $value["id"]  ?></td>
            <td><?php echo $value["nomreRol"]  ?></td>

            <td>

                <div class='btn-group'>

                    <button class="btn btn-warning btn-sm btnEditarRoles"
                        data-toggle="modal" idRol="<?php echo $value["id"]  ?>"
                        data-target="#modal-editar-rol">
                        <i><ion-icon name="pencil-outline"></ion-icon></i>
                    </button>

                    <button class="btn btn-danger btn-sm eliminarRol"
                            idRolesE="<?php echo $value["id"]  ?>">
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
              <!-- /.container -->
      </section>
      <!-- /.section -->
        </div>       








<!--=====================================
Modal Crear roles
======================================-->
<!-- Modal -->
<div class="modal fade" id="modal-crear-roles" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
              <div class="card-body">
		            
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon name="person-circle-sharp"></ion-icon></span>
                  </div>
                  <input type="text" class="form-control" name="nom_rol" placeholder="Nombre de Rol">
                </div>


              </div>
                <!-- /.card-body -->
        </div>

        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php 

                $guardarRol = new ctrRoles();
                $guardarRol->ctrGuardarRol();
                
                
                ?>

            </form>      
    </div>
  </div>
  </div>





<!--=====================================
Modal Editar roles
======================================-->
<!-- Modal -->
<div class="modal fade" id="modal-editar-rol" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
              <div class="card-body">
		            
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon name="person-circle-sharp"></ion-icon></span>
                  </div>
                  <input type="hidden" name="id_rolE">
                    <input type="text" class="form-control" name="nom_rolE" placeholder="Nombre de Rol">
                </div>


              </div>
                <!-- /.card-body -->
      
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php 

                $editarRol = new ctrRoles();
                $editarRol->ctrEditarRol();
                
                
                ?>
</form>
    </div>
  </div>
</div>




 <!-- </div>  -->
<!-- /.wrapper -->