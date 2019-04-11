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
                    <!--              
                    <select class="form-control" id="category" name="category" style="width: 150px" onclick="toggle(this.value)" >
                        <option selected>Selecione...</option>
                        <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

                        <option value="<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo ucfirst($value1["descategory"]); ?></option>
                        <?php } ?>

                        <!--<option value="hospedagem">Hospedagem</option>--> 
                       <!-- <option value="backup">Backup</option> 
                    </select>-->

                         <!--TEste --> 
                         
                         <div class="container">
                            
                            <ul class="nav nav-tabs">
                              
                              <li><a onclick="desbloquearCheckBoxEmail()" data-toggle="tab" href="#tabEmail">E-mail</a></li>
                              <li><a onclick="desbloquearCheckBoxHospedagem()" data-toggle="tab" href="#tabHospedagem">Hospedagem</a></li>
                              <li><a onclick="desbloquearCheckBoxBackup()" data-toggle="tab" href="#tabBackup">Backup</a></li>
                            </ul>
                          
                            <div class="tab-content">
                              
                              <div id="tabEmail" class="tab-pane fade" >
                                <h3>E-mail</h3>
                                <div id="email" class="col-md-4">
                                    
                                    <ul class="list-group list-group-flush">

                                      <li class="list-group-item hidden">
                                        EMAIL
                                        <label class="switch ">
                                        <input type="checkbox" class="primary primary-email" value="category-email" id="category-email" name="category-email">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                      
                                        <li class="list-group-item">
                                            IMAP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary primary-email" value="category-email-imap" onclick="toggle('previsao-imap')"  id="category-email-imap" name="category-email-imap">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            POP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-email-pop" onclick="toggle('previsao-pop')" id="category-email-pop" name="category-email-pop">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            SMTP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-email-smtp" onclick="toggle('previsao-smtp')" id="category-email-smtp" name="category-email-smtp">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            WEBMAIL
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-email-webmail" onclick="toggle('previsao-webmail')" id="category-email-webmail" name="category-email-webmail">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            FILA
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-email-fila" onclick="toggle('previsao-fila')" id="category-email-fila" name="category-email-fila">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <div class="card-header">Cluster</div>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                        MAIL 01
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="mail01" id="category-email-mail01" name="category-email-mail01">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                        MAIL 02
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="mail02" id="category-email-mail02" name="category-email-mail02">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            MAIL 03
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="mail03" id="category-email-mail03" name="category-email-mail03">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                    </ul>

                                    <div class="form-group" id="previsao-imap" style="display:none;">
                                        <label for="previsao">Previsão IMAP</label>
                                        <input type="text" class="form-control" id="previsao-imap-email" name="previsao-imap-email" placeholder="Digite a previsao" style="width: 150px">
                                        <!--
                                        <div class="col-md-4">
                                            <label for="data-consulta">Data</label>
                                            <input type="date" class="form-control" id="data-consulta" name="data-consulta" style="width: 150px">
                                            <input id="horas" type="time" name="horas" style="width: 100px">
                                            <!--<input id="horas" type="time" name="horas" required>
                                        </div>
                                       -->
                                        
                                    </div>
  
                                    <div class="form-group" id="previsao-pop" style="display:none;">
                                        <label for="previsao">Previsão POP</label>
                                        <input type="text" class="form-control" id="previsao-pop-email" name="previsao-pop-email" placeholder="Digite a previsao" style="width: 150px">
                                    </div>
  
                                    <div class="form-group" id="previsao-smtp" style="display:none;">
                                        <label for="previsao">Previsão SMTP</label>
                                        <input type="text" class="form-control" id="previsao-smtp-email" name="previsao-smtp-email" placeholder="Digite a previsao" style="width: 150px">
                                    </div>
  
                                    <div class="form-group" id="previsao-webmail" style="display:none;">
                                        <label for="previsao">Previsão WEBMAIL</label>
                                        <input type="text" class="form-control" id="previsao-webmail-email" name="previsao-webmail-email" placeholder="Digite a previsao" style="width: 150px">
                                    </div>
  
                                    <div class="form-group" id="previsao-fila" style="display:none;">
                                        <label for="previsao">Previsão FILA</label>
                                        <input type="text" class="form-control" id="previsao-fila-email" name="previsao-fila-email" placeholder="Digite a previsao" style="width: 150px">
                                    </div>
  
                                  </div>  <!-- Fim minhaDiv -->
                              </div>

                              <div id="tabHospedagem" class="tab-pane fade">
                                <h3>Hospedagem</h3>
                                <div id="hospedagem" class="col-md-4">  
                                    
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item hidden">
                                            HOSPEDAGEM
                                            <label class="switch ">
                                            <input type="checkbox" class="primary primary-email" value="category-hospedagem" id="category-hospedagem" name="category-hospedagem">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                            HTTP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-hospedagem-http" onclick="toggle('http')" id="category-hospedagem-http" name="category-hospedagem-http">
                                            <span class="slider round"></span>
                                            </label>
                                            
                                        </li>
                                        <li class="list-group-item">
                                            APACHE
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-hospedagem-apache" onclick="toggle('apache')" id="category-hospedagem-apache" name="category-hospedagem-apache">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            NGINX
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="category-hospedagem-nginx" onclick="toggle('nginx')" id="category-hospedagem-nginx" name="category-hospedagem-nginx">
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

                                    <div class="form-group" id="http" style="display:none;">
                                        <label for="previsao">Previsão Http</label>
                                        <input type="text" class="form-control" id="previsao-http" name="previsao-http" placeholder="Digite a previsao" style="width: 150px">
                                    </div>

                                    <div class="form-group" id="apache" style="display:none;">
                                        <label for="previsao">Previsão Apache</label>
                                        <input type="text" class="form-control" id="previsao-apache" name="previsao-apache" placeholder="Digite a previsao" style="width: 150px">
                                    </div>

                                    <div class="form-group" id="nginx" style="display:none;">
                                        <label for="previsao">Previsão Nginx</label>
                                        <input type="text" class="form-control" id="previsao-nginx" name="previsao-nginx" placeholder="Digite a previsao" style="width: 150px">
                                    </div>
                                  </div>
                              </div>
                              
                              <div id="tabBackup" class="tab-pane fade col-md-4">
                                <h3>Backup</h3>
                                <ul class="list-group list-group-flush">

                                    
                                    <li class="list-group-item">
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="category-backup" onclick="toggle('backup')" id="category-backup" name="category-backup">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="form-group" id="backup" style="display:none;">
                                    <label for="previsao">Previsão backup</label>
                                    <input type="text" class="form-control" id="previsao-backup" name="previsao-backup" placeholder="Digite a previsao" style="width: 150px">
                                </div>
                                
                              </div>
                            </div>
                          </div>
                            
                               <!--  
                                <div id="minhaDiv">Conteudo</div>
                                <button type="button" class="btn-toggle" data-element="#minhaDiv">Mostrar / Esconder</button>
                                -->
                                

                                  <div style="margin:50px 0">
                                      
                                      <!-- Default panel contents
                                      <div class="card-header">
                                        
                                        <label class="switchcase">
                                          E-mail
                                            <input type="checkbox" class="primary" value="category-email" onclick="toggle('minhaDivEmail')" id="category-email" name="category-email">
                                            <button type="button" class="btn-toggle" id="addblockE" onclick="toggle('minhaDivEmail')" style="width:100px">E-mail</button>
                                            
                                        </label>
                                      </div> -->

                                      

                                      
                                       
                                  </div>

                                  <div style="margin:50px 0">
                                      
                                      <!-- Default panel contents
                                      <div class="card-header">
                                          
                                          <label class="switchcase">
                                            Hospedagem
                                              <input type="checkbox" class="primary" value="category-email" id="category-email" name="category-email">
                                              <input type="checkbox" class="primary" value="category-hospedage" onclick="toggle('minhaDivHospedagem')" id="category-hospedage" name="category-hospedage">
                                              <button type="button" class="btn-toggle" id="addblockH" onclick="toggle('minhaDivHospedagem')">Hospedagem</button>
                                              
                                          </label>
                                        </div>
                                      -->
                                          
                                      
                                       
                                  </div>
                                  

                                  
                            
                        <!--FIM TEste -->

                </div><!-- /CONTAINER CATEGORIA 

              <div class="form-group">
                <label for="previsao">Previsão</label>
                <input type="text" class="form-control" id="previsao" name="previsao" placeholder="Digite a previsao" style="width: 150px">
              </div>
-->


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
            <button type="submit" class="btn btn-success">Cadastrar</button>
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
          /*
            $("#addblock").click(function() {
            $('.hiddenHosp').removeClass("hidden");
          });

          $("#addblockE").click(function() {
            $('.hiddenE').removeClass("hidden");
          });*/ 
          function toggle(sDivId) {
                var oDiv = document.getElementById(sDivId);
                oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";
                
                                
          }       

          function desbloquearCheckBoxEmail(){  
            
                          
              document.getElementById('category-email').checked = true;
                            
              document.getElementById('category-hospedagem').checked = false;
              document.getElementById('category-hospedagem-http').checked = false;
              document.getElementById('category-hospedagem-apache').checked = false;
              document.getElementById('category-hospedagem-nginx').checked = false;

              document.getElementById('category-backup').checked = false;

              var http = document.getElementById('http');
              http.style.display = "none";

              var apache = document.getElementById('apache');
              apache.style.display = "none";

              var nginx = document.getElementById('nginx');
              nginx.style.display = "none";

              var backup = document.getElementById('backup');
              backup.style.display = "none";

          }

          function desbloquearCheckBoxHospedagem(){ 
                       
            document.getElementById('category-hospedagem').checked = true;            

            document.getElementById('category-email').checked = false;
            document.getElementById('category-email-imap').checked = false;
            document.getElementById('category-email-pop').checked = false;
            document.getElementById('category-email-smtp').checked = false;
            document.getElementById('category-email-webmail').checked = false;
            document.getElementById('category-email-fila').checked = false;

            document.getElementById('category-backup').checked = false;

            var imap = document.getElementById('previsao-imap');
            imap.style.display = "none";

            var pop = document.getElementById('previsao-pop');
            pop.style.display = "none";

            var smtp = document.getElementById('previsao-smtp');
            smtp.style.display = "none";

            var webmail = document.getElementById('previsao-webmail');
            webmail.style.display = "none";

            var fila = document.getElementById('previsao-fila');
            fila.style.display = "none";

            var backup = document.getElementById('backup');
            backup.style.display = "none";
        }

        function desbloquearCheckBoxBackup(){  
          
                       
            document.getElementById('category-email').checked = false;
            
            
            document.getElementById('category-email-imap').checked = false;
            document.getElementById('category-email-pop').checked = false;
            document.getElementById('category-email-smtp').checked = false;
            document.getElementById('category-email-webmail').checked = false;
            document.getElementById('category-email-fila').checked = false;

            document.getElementById('category-hospedagem').checked = false;
            document.getElementById('category-hospedagem-http').checked = false;
            document.getElementById('category-hospedagem-apache').checked = false;
            document.getElementById('category-hospedagem-nginx').checked = false;

            var imap = document.getElementById('previsao-imap');
            imap.style.display = "none";

            var pop = document.getElementById('previsao-pop');
            pop.style.display = "none";

            var smtp = document.getElementById('previsao-smtp');
            smtp.style.display = "none";

            var webmail = document.getElementById('previsao-webmail');
            webmail.style.display = "none";

            var fila = document.getElementById('previsao-fila');
            fila.style.display = "none";

            var http = document.getElementById('http');
            http.style.display = "none";

            var apache = document.getElementById('apache');
            apache.style.display = "none";

            var nginx = document.getElementById('nginx');
            nginx.style.display = "none";

            var backup = document.getElementById('backup');
            backup.style.display = "none";

          
            

          
        }

        </script>