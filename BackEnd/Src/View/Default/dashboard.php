<!DOCTYPE html>
<html>
    <head>
        <?= $bootstrapHelper->css() ?>
        <?= $styleHelper->css() ?>
    </head>
    <body>
        <?php
            require_once parent::loadView('Layout', 'menu_superior_admin');
        ?>
        <div id="wrapper">
            <?php require_once parent::loadView('Layout', 'menu_lateral_admin'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid xyz">
                <div id="page-content-wrapper">
         <div class="container-fluid xyz">
            <div class="row mt-2">
               <div class="col-lg-12">
                   <h1 class="mb-3">Bem Vindo</h1>
                  <h3 class="display-5">Principais Imóveis</h3>
                  <hr />
               </div>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="card">
                     <img class="card-img-top" src="http://placehold.it/250x150" alt="Card image cap">
                     <div class="card-block">
                        <h4 class="card-title">Nome Imóvel</h4>
                        <p class="card-text">Texto</p>
                     </div>
                     <div class="card-footer">

                        <input type="submit" class="btn btn-card" value="Visualizar" data-toggle="modal" data-target="#abrirModal">
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="card">
                     <img class="card-img-top" src="http://placehold.it/250x150" alt="Card image cap">
                     <div class="card-block">
                        <h4 class="card-title">Nome Imóvel</h4>
                        <p class="card-text">Texto</p>
                     </div>
                     <div class="card-footer">
                        <input type="submit" class="btn btn-card" value="Visualizar">

                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="card">
                     <img class="card-img-top" src="http://placehold.it/250x150" alt="Card image cap">
                     <div class="card-block">
                        <h4 class="card-title">Nome Imóvel</h4>
                        <p class="card-text">Texto</p>
                     </div>
                     <div class="card-footer">
                        <input type="submit" class="btn btn-card" value="Visualizar">

                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="card">
                     <img class="card-img-top" src="http://placehold.it/250x150" alt="Card image cap">
                     <div class="card-block">
                        <h4 class="card-title">Nome Imóvel</h4>
                        <p class="card-text">Texto</p>
                     </div>
                     <div class="card-footer">
                        <input type="submit" class="btn btn-card" value="Visualizar">
                     </div>
                  </div>
               </div>
            </div>
               <div class="row">
                  <div class="col-12">
                       
                        <h3 class="display-5 mt-5">Nossa Localização</h3>
                        <hr/>
                       
                              <div id="map"></div>
                         
                              <script>
                          // Initialize and add the map
                          function initMap() {
                            // The location of Uluru
                            var uluru = {lat: -23.9618784, lng: -46.3322576};
                            // The map, centered at Uluru
                            var map = new google.maps.Map(
                                document.getElementById('map'), {zoom: 4, center: uluru});
                            // The marker, positioned at Uluru
                            var marker = new google.maps.Marker({position: uluru, map: map});
                          }
                          
                              </script>
                              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDGm2MPbtHN53rSmnfPQPsucmJcLUta8c&callback=initMap"
async defer></script>
                              <!--Load the API from the specified URL
                              * The async attribute allows the browser to render the page while the API loads
                              * The key parameter will contain your own API key (which is not needed for this tutorial)
                              * The callback parameter executes the initMap() function
                              -->
                              <!--Link da API com a chave-->
                            
                  </div>
                  
               </div>
         
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
                </div>
            </div>
        </div>
    </body>
</html>