  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Carta</h1> -->
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
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Platillos</h4>
                  <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Platillos </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <!-- <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">                    
                      <a href="https://via.placeholder.com/1200/000000.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="https://via.placeholder.com/1200/000000.png?text=1" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div> -->
                    <?php  ?>

                      <?php 
                      foreach($platillos as $key => $value){    
                      
                    ?>
                    <div class="filtr-item col-sm-4" data-category="2, 4" data-sort="black sample">
                      <a href="<?php echo $value["fotoPlatillo"]  ?>" data-toggle="lightbox" data-title="<?php echo $value["nombrePlatillo"]  ?>">
                        <img src="<?php echo $value["fotoPlatillo"]  ?>" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>

                    <?php 

                      }

                    ?>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>


        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Bebidas</h4>
                  <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Platillos </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <!-- <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">                    
                      <a href="https://via.placeholder.com/1200/000000.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="https://via.placeholder.com/1200/000000.png?text=1" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div> -->
                    <?php  ?>

                      <?php 
                      foreach($bebidas as $key => $value){    
                      
                    ?>
                    <div class="filtr-item col-sm-4" data-category="2, 4" data-sort="black sample">
                      <a href="<?php echo $value["fotoBebida"]  ?>" data-toggle="lightbox" data-title="<?php echo $value["nombreBebida"]  ?>">
                        <img src="<?php echo $value["fotoBebida"]  ?>" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>

                    <?php 

                      }

                    ?>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>


        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Postres</h4>
                  <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Platillos </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <!-- <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">                    
                      <a href="https://via.placeholder.com/1200/000000.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="https://via.placeholder.com/1200/000000.png?text=1" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div> -->
                    <?php  ?>

                      <?php 
                      foreach($postres as $key => $value){    
                      
                    ?>
                    <div class="filtr-item col-sm-4" data-category="2, 4" data-sort="black sample">
                      <a href="<?php echo $value["fotoPostre"]  ?>" data-toggle="lightbox" data-title="<?php echo $value["nombrePostre"]  ?>">
                        <img src="<?php echo $value["fotoPostre"]  ?>" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>

                    <?php 

                      }

                    ?>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>        

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- </div> -->
<!-- /.wrapper -->

