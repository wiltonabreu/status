<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastrar Incidente
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/events">Incidente</a></li>
      <li class="active"><a href="/admin/events/create">Cadastrar</a></li>
    </ol>
  </section>
        
        <!-- Main content -->
  <section class="content">
  
    <div class="row"> <!-- div class="row" -->

      <div class="col-md-12"> <!-- class="col-md-12" -->

        <div class="box box-success"> <!-- box box-success" -->

          <div class="box-header with-border">
            <h3 class="box-title">Novo Incidente</h3>
          </div>

          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/events/create" method="post" id="createincident"> <!-- form role="form" -->

            <div class="box-body"> <!-- class="box-body" -->

              <div class="form-group">
                  <label for="title"><h3>Titulo</h3></label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo" required>
              </div>

              <div class="form-group">
                <label for="descricao"><h3>Descrição</h3></label>                      
                <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição" required></textarea>
              </div>
             

                <div class="form-group container container-categoria"><!-- CONTAINER CATEGORIA --> 
                    <label for="category"><h3>Categoria</h3></label>
                   
                         <!--TEste --> 
                         
                         <div class="container">
                            
                            <ul class="nav nav-tabs">                              
                              <li><a onclick="desbloquearCheckBoxEmail()" data-toggle="tab" href="#tabEmail">E-mail</a></li>
                              <li><a onclick="desbloquearCheckBoxHospedagem()" data-toggle="tab" href="#tabHospedagem">Hospedagem</a></li>
                              <li><a onclick="desbloquearCheckBoxBackup()" data-toggle="tab" href="#tabBackup">Backup</a></li>
                              <li><a onclick="desbloquearCheckBoxPainel()" data-toggle="tab" href="#tabPainel">Painel de Controle</a></li>
                            </ul>
                          
                            <div class="tab-content">
                              
                              <div id="tabEmail" class="tab-pane fade" >
                                <h3>E-mail</h3>
                                <div id="email" class="col-md-4">
                                    
                                    <ul class="list-group list-group-flush">

                                      <li class="list-group-item hidden">
                                        EMAIL
                                        <label class="switch ">
                                        <input type="checkbox" class="primary primary_email" value="1" id="category_email" name="category_email">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                      
                                        <li class="list-group-item">
                                            IMAP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary primary_email" value="1" onclick="toggle('previsao_imap');desbloquearCheckBoxPopSmtpWebmailFilaEas()" id="category_email_imap" name="category_email_imap">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            POP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('previsao_pop');desbloquearCheckBoxImapSmtpWebmailFilaEas()" id="category_email_pop" name="category_email_pop">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            SMTP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('previsao_smtp');desbloquearCheckBoxImapPopWebmailFilaEas()" id="category_email_smtp" name="category_email_smtp">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            WEBMAIL
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('previsao_webmail');desbloquearCheckBoxImapPopSmtpFilaEas()" id="category_email_webmail" name="category_email_webmail">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            FILA
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('previsao_fila');desbloquearCheckBoxImapPopSmtpWebmailEas()" id="category_email_fila" name="category_email_fila">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                          Colaboração
                                          <label class="switch ">
                                          <input type="checkbox" class="primary" value="1" onclick="toggle('previsao_eas');desbloquearCheckBoxImapPopSmtpWebmailfila()" id="category_email_eas" name="category_email_eas">
                                          <span class="slider round"></span>
                                          </label>
                                      </li>

                                        <div class="card-header">Cluster</div>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                        MAIL 01
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail02Mail03()" id="category_email_mail01" name="category_email_mail01">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                        MAIL 02
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail01Mail03()" id="category_email_mail02" name="category_email_mail02">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                        MAIL 03
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail01Mail02()" id="category_email_mail03" name="category_email_mail03">
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
                                            <input type="checkbox" class="primary primary_email" value="1" id="category_hospedagem" name="category_hospedagem">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                            HTTP
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('http')" id="category_hospedagem_http" name="category_hospedagem_http">
                                            <span class="slider round"></span>
                                            </label>
                                            
                                        </li>
                                        <li class="list-group-item">
                                            Banco de dados
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="toggle('bd')" id="category_hospedagem_bd" name="category_hospedagem_bd">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        
                                        
                                        <div class="card-header">Cluster</div>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                        Plesk linux 1
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin3Win()" id="category_hospedagem_lin1" name="category_hospedagem_lin1">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                        Plesk linux 3
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin1Win()" id="category_hospedagem_lin3" name="category_hospedagem_lin3">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                        Plesk Windows
                                            <label class="switch ">
                                            <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin1lin3()" id="category_hospedagem_win" name="category_hospedagem_win">
                                            <span class="slider round"></span>
                                            </label>
                                        </li>
                                    </ul>

                                    <div class="form-group" id="http" style="display:none;">
                                        <label for="previsao">Previsão Http</label>
                                        <input type="text" class="form-control" id="previsao_http" name="previsao_http" placeholder="Digite a previsao" style="width: 150px">
                                    </div>

                                    <div class="form-group" id="bd" style="display:none;">
                                        <label for="previsao">Previsão Banco de dados</label>
                                        <input type="text" class="form-control" id="previsao_bd" name="previsao_bd" placeholder="Digite a previsao" style="width: 150px">
                                    </div>

                                    
                                  </div>
                              </div>
                              
                              <div id="tabBackup" class="tab-pane fade col-md-4">
                                <h3>Backup</h3>
                                <ul class="list-group list-group-flush">

                                    
                                    <li class="list-group-item">
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="toggle('backup')" id="category_backup" name="category_backup">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="form-group" id="backup" style="display:none;">
                                    <label for="previsao">Previsão backup</label>
                                    <input type="text" class="form-control" id="previsao_backup" name="previsao_backup" placeholder="Digite a previsao" style="width: 150px">
                                </div>
                                
                              </div>


                              <div id="tabPainel" class="tab-pane fade col-md-4">
                                <h3>Painel de Controle</h3>
                                <ul class="list-group list-group-flush">

                                    
                                    <li class="list-group-item">
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="toggle('painel')" id="category_painel" name="category_painel">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="form-group" id="painel" style="display:none;">
                                    <label for="previsao">Previsão Painel</label>
                                    <input type="text" class="form-control" id="previsao_painel" name="previsao_painel" placeholder="Digite a previsao" style="width: 150px">
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

        