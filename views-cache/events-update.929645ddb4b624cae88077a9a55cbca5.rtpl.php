<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Eventos
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Evento</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

<!-- Inicio teste ediçao formulário-->
              

                <form role="form" action="/admin/events/create" method="post" id="createincident"> <!-- form role="form" -->

                  <div class="box-body"> <!-- class="box-body" -->
      
                    <div class="form-group">
                        <label for="title"><h3>Titulo</h3></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo">
                    </div>
      
                    <div class="form-group">
                      <label for="descricao"><h3>Descrição</h3></label>                      
                      <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"></textarea>
                    </div>
      
                    
      
                      <div class="form-group container container-categoria"><!-- CONTAINER CATEGORIA --> 
                          <label for="category"><h3>Categoria</h3></label>
                         
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
                                              <input type="checkbox" class="primary primary_email" value="category_email" <?php if( $incidentes["category_email"] != NULL ){ ?>checked<?php } ?> id="category_email" name="category_email">
                                              <span class="slider round"></span>
                                              </label>
                                          </li>
                                            
                                              <li class="list-group-item">
                                                  IMAP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary primary_email" value="category_email_imap" <?php if( $incidentes["category_email_imap"] != NULL ){ ?>checked<?php } ?> onclick="toggle('previsao_imap')"  id="category_email_imap" name="category_email_imap">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  POP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_email_pop" onclick="toggle('previsao_pop')" id="category_email_pop" name="category_email_pop">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  SMTP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_email_smtp" onclick="toggle('previsao_smtp')" id="category_email_smtp" name="category_email_smtp">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  WEBMAIL
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_email_webmail" onclick="toggle('previsao_webmail')" id="category_email_webmail" name="category_email_webmail">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  FILA
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_email_fila" onclick="toggle('previsao_fila')" id="category_email_fila" name="category_email_fila">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                Colaboração
                                                <label class="switch ">
                                                <input type="checkbox" class="primary" value="category_email_eas" onclick="toggle('previsao_eas')" id="category_email_eas" name="category_email_eas">
                                                <span class="slider round"></span>
                                                </label>
                                            </li>
      
                                              <div class="card-header">Cluster</div>
                                              <ul class="list-group list-group-flush">
                                              <li class="list-group-item">
                                              MAIL 01
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail01" id="category_email_mail01" name="category_email_mail01">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
      
                                              <li class="list-group-item">
                                              MAIL 02
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail02" id="category_email_mail02" name="category_email_mail02">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                              MAIL 03
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="mail03" id="category_email_mail03" name="category_email_mail03">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                          </ul>
      
                                          <div class="form-group" id="previsao_imap" style="display:none;">
                                              <label for="previsao">Previsão IMAP</label>
                                              <input type="text" class="form-control" id="previsao_imap_email" name="previsao_imap_email" placeholder="Digite a previsao" style="width: 150px">
                                                                                    
                                          </div>
        
                                          <div class="form-group" id="previsao_pop" style="display:none;">
                                              <label for="previsao">Previsão POP</label>
                                              <input type="text" class="form-control" id="previsao_pop_email" name="previsao_pop_email" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
        
                                          <div class="form-group" id="previsao_smtp" style="display:none;">
                                              <label for="previsao">Previsão SMTP</label>
                                              <input type="text" class="form-control" id="previsao_smtp_email" name="previsao_smtp_email" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
        
                                          <div class="form-group" id="previsao_webmail" style="display:none;">
                                              <label for="previsao">Previsão WEBMAIL</label>
                                              <input type="text" class="form-control" id="previsao_webmail_email" name="previsao_webmail_email" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
        
                                          <div class="form-group" id="previsao_fila" style="display:none;">
                                              <label for="previsao">Previsão FILA</label>
                                              <input type="text" class="form-control" id="previsao_fila_email" name="previsao_fila_email" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
      
                                          <div class="form-group" id="previsao_eas" style="display:none;">
                                            <label for="previsao">Previsão Colaboração</label>
                                            <input type="text" class="form-control" id="previsao_eas_email" name="previsao_eas_email" placeholder="Digite a previsao" style="width: 150px">
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
                                                  <input type="checkbox" class="primary primary_email" value="category_hospedagem" id="category_hospedagem" name="category_hospedagem">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
      
                                              <li class="list-group-item">
                                                  HTTP
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_http" onclick="toggle('http')" id="category_hospedagem_http" name="category_hospedagem_http">
                                                  <span class="slider round"></span>
                                                  </label>
                                                  
                                              </li>
                                              <li class="list-group-item">
                                                  APACHE
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_apache" onclick="toggle('apache')" id="category_hospedagem_apache" name="category_hospedagem_apache">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                                  NGINX
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_nginx" onclick="toggle('nginx')" id="category_hospedagem_nginx" name="category_hospedagem_nginx">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              
                                              <div class="card-header">Cluster</div>
                                              <ul class="list-group list-group-flush">
                                              <li class="list-group-item">
                                              Plesk linux 1
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_lin1" id="category_hospedagem_lin1" name="category_hospedagem_lin1">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
      
                                              <li class="list-group-item">
                                              Plesk linux 3
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_lin3" id="category_hospedagem_lin3" name="category_hospedagem_lin3">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                              <li class="list-group-item">
                                              Plesk Windows
                                                  <label class="switch ">
                                                  <input type="checkbox" class="primary" value="category_hospedagem_win" id="category_hospedagem_win" name="category_hospedagem_win">
                                                  <span class="slider round"></span>
                                                  </label>
                                              </li>
                                          </ul>
      
                                          <div class="form-group" id="http" style="display:none;">
                                              <label for="previsao">Previsão Http</label>
                                              <input type="text" class="form-control" id="previsao_http" name="previsao_http" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
      
                                          <div class="form-group" id="apache" style="display:none;">
                                              <label for="previsao">Previsão Apache</label>
                                              <input type="text" class="form-control" id="previsao_apache" name="previsao_apache" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
      
                                          <div class="form-group" id="nginx" style="display:none;">
                                              <label for="previsao">Previsão Nginx</label>
                                              <input type="text" class="form-control" id="previsao_nginx" name="previsao_nginx" placeholder="Digite a previsao" style="width: 150px">
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div id="tabBackup" class="tab-pane fade col-md-4">
                                      <h3>Backup</h3>
                                      <ul class="list-group list-group-flush">
      
                                          
                                          <li class="list-group-item">
                                              <label class="switch ">
                                              <input type="checkbox" class="primary" value="category_backup" onclick="toggle('backup')" id="category_backup" name="category_backup">
                                              <span class="slider round"></span>
                                              </label>
                                          </li>
                                      </ul>
      
                                      <div class="form-group" id="backup" style="display:none;">
                                          <label for="previsao">Previsão backup</label>
                                          <input type="text" class="form-control" id="previsao_backup" name="previsao_backup" placeholder="Digite a previsao" style="width: 150px">
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                                
                              <!--FIM TEste -->
      
                      </div><!-- /CONTAINER CATEGORIA -->
      
                    <div class="form-group">
                      <label for="status_service"><h3>Status</h3></label>                      
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
                function toggle(sDivId) {
                      var oDiv = document.getElementById(sDivId);
                      oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";             
                                      
                }       
      
                function desbloquearCheckBoxEmail(){  
                  
                                
                    document.getElementById('category_email').checked = true;
                                  
                    document.getElementById('category_hospedagem').checked = false;
                    document.getElementById('category_hospedagem_http').checked = false;
                    document.getElementById('category_hospedagem_apache').checked = false;
                    document.getElementById('category_hospedagem_nginx').checked = false;
                    document.getElementById('category_hospedagem_lin1').checked = false;
                    document.getElementById('category_hospedagem_lin3').checked = false;
                    document.getElementById('category_hospedagem_win').checked = false;
      
                    
      
                    document.getElementById('category_backup').checked = false;
      
                    var http = document.getElementById('http');
                    http.style.display = "none";
                    document.getElementById('previsao_http').value = "";
      
                    var apache = document.getElementById('apache');
                    apache.style.display = "none";
                    document.getElementById('previsao_apache').value = "";
      
                    var nginx = document.getElementById('nginx');
                    nginx.style.display = "none";
                    document.getElementById('previsao_nginx').value = "";
      
                    var backup = document.getElementById('backup');
                    backup.style.display = "none";
                    document.getElementById('previsao_backup').value = "";
      
                }
      
                function desbloquearCheckBoxHospedagem(){ 
                             
                  document.getElementById('category_hospedagem').checked = true;            
      
                  document.getElementById('category_email').checked = false;
                  document.getElementById('category_email_imap').checked = false;
                  document.getElementById('category_email_pop').checked = false;
                  document.getElementById('category_email_smtp').checked = false;
                  document.getElementById('category_email_webmail').checked = false;
                  document.getElementById('category_email_eas').checked = false;
                  document.getElementById('category_email_fila').checked = false;
                  document.getElementById('category_email_mail01').checked = false;
                  document.getElementById('category_email_mail02').checked = false;
                  document.getElementById('category_email_mail03').checked = false;
      
                  document.getElementById('category_backup').checked = false;            
                  
      
                  var imap = document.getElementById('previsao_imap');
                  imap.style.display = "none";
                  document.getElementById('previsao_imap_email').value = "";
      
                  var pop = document.getElementById('previsao_pop');
                  pop.style.display = "none";
                  document.getElementById('previsao_pop_email').value = "";
      
                  var smtp = document.getElementById('previsao_smtp');
                  smtp.style.display = "none";
                  document.getElementById('previsao_smtp_email').value = "";
      
                  var webmail = document.getElementById('previsao_webmail');
                  webmail.style.display = "none";
                  document.getElementById('previsao_webmail_email').value = "";
      
                  var fila = document.getElementById('previsao_fila');
                  fila.style.display = "none";
                  document.getElementById('previsao_fila_email').value = "";
      
                  var eas = document.getElementById('previsao_eas');
                  eas.style.display = "none";
                  document.getElementById('previsao_eas_email').value = "";
      
                  var backup = document.getElementById('backup');
                  backup.style.display = "none";
                  document.getElementById('previsao_backup').value = "";
              }
      
              function desbloquearCheckBoxBackup(){  
                
                             
                  document.getElementById('category_email').checked = false;          
                  
                  document.getElementById('category_email_imap').checked = false;
                  document.getElementById('category_email_pop').checked = false;
                  document.getElementById('category_email_smtp').checked = false;
                  document.getElementById('category_email_webmail').checked = false;
                  document.getElementById('category_email_fila').checked = false;
                  document.getElementById('category_email_eas').checked = false;
                  document.getElementById('category_email_mail01').checked = false;
                  document.getElementById('category_email_mail02').checked = false;
                  document.getElementById('category_email_mail03').checked = false;
      
                  document.getElementById('category_hospedagem').checked = false;
                  document.getElementById('category_hospedagem_http').checked = false;
                  document.getElementById('category_hospedagem_apache').checked = false;
                  document.getElementById('category_hospedagem_nginx').checked = false;
                  document.getElementById('category_hospedagem_lin1').checked = false;
                  document.getElementById('category_hospedagem_lin3').checked = false;
                  document.getElementById('category_hospedagem_win').checked = false;
      
                  var imap = document.getElementById('previsao_imap');
                  imap.style.display = "none";
                  document.getElementById('previsao_imap_email').value = "";
      
                  var pop = document.getElementById('previsao_pop');
                  pop.style.display = "none";
                  document.getElementById('previsao_pop_email').value = "";
      
                  var smtp = document.getElementById('previsao_smtp');
                  smtp.style.display = "none";
                  document.getElementById('previsao_smtp_email').value = "";
      
                  var webmail = document.getElementById('previsao_webmail');
                  webmail.style.display = "none";
                  document.getElementById('previsao_webmail_email').value = "";
      
                  var fila = document.getElementById('previsao_fila');
                  fila.style.display = "none";
                  document.getElementById('previsao_fila_email').value = "";
      
                  var eas = document.getElementById('previsao_eas');
                  eas.style.display = "none";
                  document.getElementById('previsao_eas_email').value = "";
      
                  var http = document.getElementById('http');
                  http.style.display = "none";
                  document.getElementById('previsao_http').value = "";
      
                  var apache = document.getElementById('apache');
                  apache.style.display = "none";
                  document.getElementById('previsao_apache').value = "";
      
                  var nginx = document.getElementById('nginx');
                  nginx.style.display = "none";
                  document.getElementById('previsao_nginx').value = "";
              }
      
              </script>

              <!--TEste edicaçao formulario -->

<!--
                <form role="form" action="/admin/events/<?php echo htmlspecialchars( $incidentes["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                    <div class="box-body">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo" value="<?php echo htmlspecialchars( $incidentes["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>
                            <div class="form-group">
                              <label for="descricao">Descrição</label>                      
                              <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"><?php echo htmlspecialchars( $incidentes["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="previsao">Previsão</label>
                              <input type="text" class="form-control" id="previsao" name="previsao" placeholder="Digite a previsao" style="width: 150px" value="<?php echo htmlspecialchars( $incidentes["previsao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>
                            <div class="form-group">
                              <label for="status_service">Status</label>                      
                              <select class="form-control" id="status_service" name="status_service" style="width: 150px"  value="<?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <option selected><?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                    <option value=0>Resolvido</option>
                                    <option value=1>Em Análise</option>
                                    
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="category">Categoria</label>
                              
                              <select class="form-control" id="category" name="category" style="width: 150px">
                                    <option selected><?php echo htmlspecialchars( $incidentes["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>                                  
                                    <option value="email">E-mail</option>
                                    <option value="hospedagem">Hospedagem</option>
                                    <option value="backup">Backup</option>
                              </select>
        
                            </div>
                            
                    </div>
                 /.box-body 
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
              </div>
              </div>
          </div>
        
        </section>
        /.content
        </div>
         /.content-wrapper -->