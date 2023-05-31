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
              <li class="breadcrumb-item active">Manejo de usuarios</li>
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
                <h3 class="card-title">Registro de Usuarios</h3>
                <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                            <button type="button" class="btn btn-success crear-usuarios" data-toggle="modal"
                                data-target="#modal-crear-usuarios">
                                Crear Nuevo Usuario
                            </button><br><br>

<table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%" id="tablaUsuarios">

    <thead>

        <tr>

            <th style="width:10px">#</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Privilegios</th>
            <th>Foto</th>
            <th>Acciones</th>



        </tr>

    </thead>

    <tbody>

    <?php  ?>



<?php 
foreach($usuarios as $key => $value){
    
    $item="id";

    $valor =$value["rol"];

    $roles = ctrRoles::ctrMostrarRoles($item ,$valor);
    
?>

        <tr>

        <td><?php echo $value["id"]  ?></td>
        <td><?php echo $value["nombre"]  ?></td>
        <td><?php echo $value["usuario"]  ?></td>
        <td><?php echo $roles["nomreRol"]  ?></td>
        <td><img src="<?php echo $value["foto"]  ?>" width="40" height="40"></td>

            <td>

                <div class='btn-group'>

                    <button class="btn btn-warning btn-sm btnEditarUsuario"
                            data-toggle="modal" idUsuario="<?php echo $value["id"]  ?>"
                            data-target="#modal-editar-usuarios">
                        <i><ion-icon name="pencil-outline"></ion-icon></i>
                    </button>

                    <button class="btn btn-danger btn-sm eliminarUsuario"
                            idUsuarioE="<?php echo $value["id"]  ?>"
                            rutaFoto="<?php echo $value["foto"]  ?>">
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
Modal Crear usuarios
======================================-->
<!-- Modal -->
<div class="modal fade" id="modal-crear-usuarios" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registro de Usuarios</h5>
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
                  <input type="text" class="form-control" name="nom_usuarios" placeholder="Nombre">
                </div>

		            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" name="nom_user" placeholder="Usuario">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon name="key-sharp"></ion-icon></span>
                  </div>
                  <input type="password" class="form-control" name="pass_user" placeholder="Password">
                </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Imagen de Usuario</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="subirImgusuarios">
                        <label class="custom-file-label" for="exampleInputFile">Elegir</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Cargar</span>
                      </div>
                    </div>
                    <img class="previsualizarImgusuarios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                  </div>

                  <div class="form-group">
                    <label>Roles</label>
                        <select class="form-control" name="rol_user" required>
                        
                            <?php
                            
                                $roles = ctrRoles::ctrMostrarRoles2();
                                
                                foreach($roles as $rol){
                                    
                            ?>
                                <option value="<?php echo $rol["id"] ?>"><?php echo $rol["nomreRol"] ?></option>
                            <?php
                              }
                            ?>

                        </select>
                </div>

                            </div>
                <!-- /.card-body -->
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?php 
                    $guardarusuarios = new ctrUsuarios();
                    $guardarusuarios->ctrGuardarUsuarios();

                ?>
                </form>
                
    </div>
  </div>
</div>



<!--=====================================
Modal Editar usuarios
======================================-->
<!-- Modal -->
<div class="modal fade" id="modal-editar-usuarios" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edición de Usuarios</h5>
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
                  <input type="hidden" id="idPerfilE" name="idPerfilE">
                  <input type="text" class="form-control" id="nom_usuariosE" name="nom_usuariosE"
                        placeholder="Nombre">
                </div>

		            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="nom_userE" name="nom_userE" placeholder="Usuario">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon name="key-sharp"></ion-icon></span>
                  </div>
                  <input type="hidden" id="pass_userActualE" name="pass_userActualE">
                  <input type="password" class="form-control" id="pass_userE" name="pass_userE"
                        placeholder="Password">
                </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Imagen de Usuario</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" name="subirImgusuariosE">
                        <label class="custom-file-label" for="exampleInputFile">Elegir</label>
                      </div>
                      <input type="hidden" id="fotoActualE" name="fotoActualE">
                      <div class="input-group-append">
                        <span class="input-group-text">Cargar</span>
                      </div>
                    </div>
                    <img class="previsualizarImgusuarios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                  </div>

                  <div class="form-group">
                    <label>Roles</label>
                    <select class="form-control" name="rol_userE" required>

                        <?php
                        $roles = ctrRoles::ctrMostrarRoles2();
                        
                        foreach($roles as $rol){
                            
                        ?>
                        <option value="<?php echo $rol["id"] ?>"><?php echo $rol["nomreRol"] ?></option>
                        <?php
                       }
                        ?>

                    </select>
                </div>

                            </div>
                <!-- /.card-body -->
          
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php 

                $editarusuarios = new ctrUsuarios();
                $editarusuarios->ctrEditarusuarios();
                
                
                ?>


            </form>
                
    </div>
  </div>
</div>









<!-- </div> -->
<!-- /.wrapper -->