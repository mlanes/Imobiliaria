<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?= $bootstrapHelper->css() ?>
        <?= $styleHelper->css() ?>
    </head>
    <body>
        <?php
            require_once parent::loadView('Layout', 'menu_superior_admin');
        ?>
      <header id="welcome" class="bg-light py-5">
         <div class="container pt-5">
            <div class="row">
               <div class="col py-4 text-center">
                  <h1>Bem-vindo</h1>
                  <p class="text-muted">Aqui você tem uma visão da nossa localização e dos nossos últimos imóveis cadastrados</p>
               </div>
            </div>
         </div>
      </header>
      <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h3>Imóveis Cadastrados</h3>
               </div>
               <div class="col-12 py-3">
                  <?php 
                     $limite = 5;
                     $x = 0;
                     foreach($imoveis as $imovel){
                        if($x < 5){
                           $this->CategoriaImovel->cd_categoria_imovel = $imovel->cd_categoria_imovel;
                           $categoria = $this->CategoriaImovel->select();
                  ?>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                     <div class="card">
                        <div class="card-block p-3">
                           <p class="card-title h6"> <b>REF.:</b> <?= $imovel->cd_imovel ?> </p>
                           <p class="card-text"> <b>Categoria:</b> <?= $categoria->nm_categoria_imovel ?></p>
                           <p class="card-text"> <span class="text-success font-weight-bold h5">R$</span> <?= $imovel->vl_preco ?></p>      
                        </div>
                        <div class="card-footer">
                           <a href="<?php echo HOME_URL . 'Imovel/View/'. $imovel->cd_imovel?>">
                              <button class="btn btn-primary w-100">Visualizar</button>
                           </a>
                        </div>
                     </div>
                  </div>
                  <?php $x++; }else{ ?>
                  <div class="col-12 text-center">
                     <a href="<?php echo HOME_URL . 'Imovel' ?>">
                        <button class="btn btn-dark font-weight-bold btn-lg">
                           Ver mais
                        </button>
                     </a>
                  </div>
                  <?php }} ?>
               </div>
            </div>
         </div>
      </section>
         <section class="bg-light mt-5" id="localization">
            <div class="container py-3">
               <div class="row justify-content-center">
                  <div class="col-12 pt-3">
                     <h3 class="text-center"> Nossa localização </h3>
                  </div>
                  <div class="col-12 pt-3">
                     <iframe class="border rounded shadow-sm" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.737076553649!2d-46.41537814998803!3d-24.005059884388185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1db2e07fed69%3A0x6ad604cd343e0624!2sPra%C3%A7a+19+de+Janeiro+-+Boqueir%C3%A3o%2C+Praia+Grande+-+SP%2C+11701-090!5e0!3m2!1spt-BR!2sbr!4v1543805213974" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </section>
         <?php
            require_once parent::loadView('Layout', 'footer_admin');
            require_once parent::loadView('Layout', 'scripts');
        ?>            
    </body>
</html>