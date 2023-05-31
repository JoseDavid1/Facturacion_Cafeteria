  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Menú</li>
              <li class="breadcrumb-item active">Carta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->      
    </section>


    
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">

      <h5 class="mb-2">Card with Image Overlay</h5>
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
                    <?php  ?>

                      <?php 
                      foreach($platillos as $key => $value){    
                        
                    ?>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="<?php echo $value["fotoPlatillo"]  ?>" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><?php echo $value["nombrePlatillo"]  ?></h5>
                    <p class="card-text text-white pb-2 pt-1"><?php echo $value["descripcionPlatillo"]  ?></p>
                    <a href="#" class="text-white">Last update 2 mins ago</a>
                  </div>
                </div>
              </div>
                <?php 

                  }

                ?>
              <!-- <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="vistas/recursos/dist/img/photo2.png" alt="Dist Photo 2">
                  <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                    <p class="card-text pb-2 pt-1 text-white">
                      Lorem ipsum dolor sit amet, <br>
                      consectetur adipisicing elit <br>
                      sed do eiusmod tempor.
                    </p>
                    <a href="#" class="text-white">Last update 15 hours ago</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="vistas/recursos/dist/img/photo3.jpg" alt="Dist Photo 3">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-primary">Card Title</h5>
                    <p class="card-text pb-1 pt-1 text-white">
                      Lorem ipsum dolor <br>
                      sit amet, consectetur <br>
                      adipisicing elit sed <br>
                      do eiusmod tempor. </p>
                    <a href="#" class="text-primary">Last update 3 days ago</a>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- </div> -->
<!-- /.wrapper -->

