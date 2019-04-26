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
                <form role="form" action="/admin/events/<?php echo htmlspecialchars( $incidentes["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                    <div class="box-body"> <!-- class="box-body" -->

                        <div class="form-group">
                            <label for="title"><h3>Titulo</h3></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars( $incidentes["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite a Titulo">
                        </div>
          
                        <div class="form-group">
                          <label for="descricao"><h3>Descrição</h3></label>                      
                          <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"><?php echo htmlspecialchars( $incidentes["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                        </div>
                            
                        
                        <div class="col-md-4">
                            <h3>E-mail</h3>                            
                                
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item hidden">
                                    EMAIL
                                    <label class="switch ">
                                    <input type="checkbox" class="primary primary_email" value="1" <?php if( $incidentes["category_email"] == 1  ){ ?>checked<?php } ?> id="category_email"  name="category_email">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                
                                <li class="list-group-item">
                                    IMAP
                                    <label class="switch ">
                                    <input type="checkbox" class="primary primary_email" value="" <?php if( $incidentes["category_email_imap"] == 1  ){ ?>checked<?php } ?>   id="category_email_imap" name="category_email_imap">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    POP
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_email_pop"] == 1  ){ ?>checked<?php } ?>  id="category_email_pop" name="category_email_pop">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    SMTP
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_email_smtp"] == 1  ){ ?>checked<?php } ?> id="category_email_smtp" name="category_email_smtp">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    WEBMAIL
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_email_webmail"] == 1  ){ ?>checked<?php } ?> id="category_email_webmail" name="category_email_webmail">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    FILA
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_email_fila"] == 1  ){ ?>checked<?php } ?> id="category_email_fila" name="category_email_fila">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Colaboração
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_email_eas"] == 1  ){ ?>checked<?php } ?> id="category_email_eas" name="category_email_eas">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                            
                        <div class="col-md-4">
                            <ul>
                                <div class="card-header"><h3>Cluster</h3></div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                    MAIL 01
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail02Mail03()" <?php if( $incidentes["category_email_mail01"] == 1  ){ ?>checked<?php } ?> id="category_email_mail01" name="category_email_mail01">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>

                                    <li class="list-group-item">
                                    MAIL 02
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail01Mail03()" <?php if( $incidentes["category_email_mail02"] == 1  ){ ?>checked<?php } ?> id="category_email_mail02" name="category_email_mail02">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                    <li class="list-group-item">
                                    MAIL 03
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxMail01Mail02()" <?php if( $incidentes["category_email_mail03"] == 1  ){ ?>checked<?php } ?> id="category_email_mail03" name="category_email_mail03">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>
                            </ul>
                        </div>                        
                          
                        <div class="col-md-4">
                            <div class="card-header"><h3>Previsões</h3></div>
                            <div class="form-group" id="previsao_imap" >
                                <label for="previsao">IMAP</label>
                                <input type="text" class="form-control" id="previsao_imap_email" value="<?php echo htmlspecialchars( $incidentes["previsao_imap_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_imap_email" placeholder="Digite a previsao" style="width: 150px">
                                                                    
                            </div>

                            <div class="form-group" id="previsao_pop" >
                                <label for="previsao">POP</label>
                                <input type="text" class="form-control" id="previsao_pop_email"  value="<?php echo htmlspecialchars( $incidentes["previsao_pop_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_pop_email" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            <div class="form-group" id="previsao_smtp" >
                                <label for="previsao">SMTP</label>
                                <input type="text" class="form-control" id="previsao_smtp_email" value="<?php echo htmlspecialchars( $incidentes["previsao_smtp_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_smtp_email" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            <div class="form-group" id="previsao_webmail" >
                                <label for="previsao">WEBMAIL</label>
                                <input type="text" class="form-control" id="previsao_webmail_email" value="<?php echo htmlspecialchars( $incidentes["previsao_webmail_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_webmail_email" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            <div class="form-group" id="previsao_fila" >
                                <label for="previsao">FILA</label>
                                <input type="text" class="form-control" id="previsao_fila_email" value="<?php echo htmlspecialchars( $incidentes["previsao_fila_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_fila_email" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            <div class="form-group" id="previsao_eas" >
                                <label for="previsao">Colaboração</label>
                                <input type="text" class="form-control" id="previsao_eas_email" value="<?php echo htmlspecialchars( $incidentes["previsao_eas_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_eas_email" placeholder="Digite a previsao" style="width: 150px">
                            </div>
                        </div>
          
                        <div class="form-group">
                          <label for="status_service"><h3>Status</h3></label>                      
                          <select class="form-control" id="status_service" name="status_service" value="<?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 150px" >
                                <option selected><?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <option value=0>Resolvido</option>
                                <option value=1>Em Análise</option>                                
                          </select>
                        </div>
                      
                    </div>
                        
                        
                      
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
              </div>
              </div>
          </div>
        
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
<script>

    function desbloquearCheckBoxMail02Mail03(){            
        document.getElementById('category_email_mail02').checked = false;
        document.getElementById('category_email_mail03').checked = false;
    }

    function desbloquearCheckBoxMail01Mail03(){
        document.getElementById('category_email_mail01').checked = false;    
        document.getElementById('category_email_mail03').checked = false;
    }

    function desbloquearCheckBoxMail01Mail02(){
        document.getElementById('category_email_mail01').checked = false;
        document.getElementById('category_email_mail02').checked = false;    
    }

</script>