<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Eventos
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/events">Eventos</a></li>
      <li class="active"><a href="/admin/events/create">Cadastrar</a></li>
    </ol>
  </section>
        
        <!-- Main content -->
  <section class="content">
  
    <div class="row"> <!-- div class="row" -->

      <div class="col-md-12"> <!-- class="col-md-12" -->

        <div class="box box-success"> <!-- box box-success" -->

          <div class="box-header with-border">
            <h3 class="box-title">Novo Evento</h3>
          </div>

          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/events/create" method="post" id="createincident"> <!-- form role="form" -->

            <div class="box-body"> <!-- class="box-body" -->

              <div class="form-group">
                  <label for="title">Titulo</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo">
              </div>

              <div class="form-group">
                <label for="descricao">Descrição</label>                      
                <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"></textarea>
              </div>

              

                <div class="form-group container container-categoria"><!-- CONTAINER CATEGORIA --> 
                    <label for="category">Categoria</label>
              
                    <select class="form-control" id="category" name="category" style="width: 150px">
                        <option selected>Selecione...</option>
                        <option value="email">E-mail</option>
                        <option value="hospedagem">Hospedagem</option>
                        <option value="backup">Backup</option>
                    </select>

                         <!--TEste --> 

                            <div class="row">

                                  <div class="col-md-6">
                                      <div class="card" style="margin:50px 0">
                                      <!-- Default panel contents -->
                                      <div class="card-header">
                                        E-mail
                                        <label class="switchcase">
                                            <input type="checkbox" class="primary" value="category-email" id="category-email" name="category-email">
                                            <span class="slider round"></span>
                                        </label>
                                      </div>
                                      
                                          <ul class="list-group list-group-flush">
                                            
                                            
                                              <li class="list-group-item hidden">
                                                  IMAP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="imap" id="category-email-imap" name="category-email-imap">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item hidden">
                                                  POP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="pop" id="category-email-pop" name="category-email-pop">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item hidden">
                                                  SMTP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="smtp" id="category-email-smtp" name="category-email-smtp">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item hidden">
                                                  WEBMAIL
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="webmail" id="category-email-webmail" name="category-email-webmail">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item hidden">
                                                  FILA
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="fila" id="category-email-fila" name="category-email-fila">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>

                                              <div class="card-header">Cluster</div>
                                              <ul class="list-group list-group-flush">
                                              <li class="list-group-item hidden">
                                              MAIL 01
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail01" id="category-email-mail01" name="category-email-mail01">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>

                                              <li class="list-group-item hidden">
                                              MAIL 02
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail02" id="category-email-mail02" name="category-email-mail02">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item hidden">
                                                  MAIL 03
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail03" id="category-email-mail03" name="category-email-mail03">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                          </ul>
                                      </div> 
                                  </div>

                                  <div class="col-md-6">
                                      <div class="card" style="margin:50px 0">
                                      <!-- Default panel contents -->
                                      <div class="card-header">
                                          Hospedagem
                                          <label class="switchcase">
                                              <input type="checkbox" class="primary" value="category-hospedagem" id="category-hospedagem" name="category-hospedagem">
                                              <span class="slider round"></span>
                                          </label>
                                        </div>
                                          
                                        

                                          <ul class="list-group list-group-flush">
                                              <li class="list-group-item">
                                                  HTTP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-http" id="category-hospedagem-http" name="category-hospedagem-http">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  APACHE
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-apache" id="category-hospedagem-apache" name="category-hospedagem-apache">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  NGINX
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-nginx" id="category-hospedagem-nginx" name="category-hospedagem-nginx">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              
                                              <div class="card-header">Cluster</div>
                                              <ul class="list-group list-group-flush">
                                              <li class="list-group-item">
                                              Plesk linux 1
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-lin1" id="category-hospedagem-lin1" name="category-hospedagem-lin1">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>

                                              <li class="list-group-item">
                                              Plesk linux 3
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-lin3" id="category-hospedagem-lin3" name="category-hospedagem-lin3">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                              Plesk Windows
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category-hospedagem-win" id="category-hospedagem-win" name="category-hospedagem-win">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                          </ul>
                                      </div> 
                                  </div>
                              </div>                         
                      
                        <!--FIM TEste -->

                </div><!-- /CONTAINER CATEGORIA -->

              <div class="form-group">
                <label for="previsao">Previsão</label>
                <input type="text" class="form-control" id="previsao" name="previsao" placeholder="Digite a previsao" style="width: 150px">
              </div>

              <div class="form-group">
                <label for="status_service">Status</label>                      
                <select class="form-control" id="status_service" name="status_service" style="width: 150px">
                      <option selected>Selecione...</option>
                      <option value=0>Resolvido</option>
                      <option value=1>Em Análise</option>
                      
                </select>
              </div>
              
              
            </div>    <!-- /.box-body -->

            <div class="box-footer">
              <!--<button type="submit" class="btn btn-success">Cadastrar</button>-->
            </div>

          </form> <!-- fim form role="form" -->

        </div> <!-- fim box box-success" -->

      </div> <!-- fim class="col-md-12" -->

    </div> <!--FIM div class="row" -->
  
  </section>
        <!-- /.content -->
</div>
        <!-- /.content-wrapper -->

<script>
$( document ).ready(function() {
    //var testimonial_ok=false;
    //Inputs that determine what fields to show
    var rating = $('#createincident input[name="category-email"]:checked');
    //var testimonial=$('#createincident input:checkbox[name=category-hospedagem]');				
    
    //Wrappers for all fields
    var category_email_imap = $('#createincident input[name="category-email-imap"]').parent();
    var category_email_pop = $('#createincident input[name="category-email-pop"]').parent();
    //var great = $('#live_form textarea[name="feedback_great"]').parent();
    //var testimonial_parent = $('#live_form #div_testimonial');
    //var thanks_anyway  = $('#live_form #thanks_anyway');
    //var all=bad.add(ok).add(great).add(testimonial_parent).add(thanks_anyway);
    var all=category_email_imap.add(category_email_pop);
    
    rating.change(function(){
        var value=this.value;						
        all.addClass('hidden'); //hide everything and reveal as needed
        
       if (value == "category-email"){
            category_email_imap.removeClass('hidden');
            category_email_pop.removeClass('hidden');								
       }
        //else if (value == 'hospedagem'){
            ok.removeClass('hidden');
       // }
        /*		
        else if (value == 'Excellent'){
            testimonial_parent.removeClass('hidden');
            if (testimonial_ok == 'yes'){great.removeClass('hidden');}
            else if (testimonial_ok == 'no'){thanks_anyway.removeClass('hidden');}
        }*/
    });	

    
    testimonial.change(function(){
        all.addClass('hidden'); 
        testimonial_parent.removeClass('hidden');
    
        testimonial_ok=this.value;
        
        if (testimonial_ok == 'yes'){
            great.removeClass('hidden');
        }
        else{
            thanks_anyway.removeClass('hidden');
        }
        
    });
});

</script>