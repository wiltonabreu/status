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
                            <h3>Hospedagem</h3>                            
                                
                            <ul class="list-group list-group-flush">

                                
                                <li class="list-group-item hidden">
                                    HOSPEDAGEM
                                    <label class="switch ">
                                    <input type="checkbox" class="primary primary_email" value="1" <?php if( $incidentes["category_hospedagem"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem" name="category_hospedagem">
                                    <span class="slider round"></span>
                                    </label>
                                </li>
                                
                                <li class="list-group-item">
                                    HTTP
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_hospedagem_http"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem_http" name="category_hospedagem_http">
                                    <span class="slider round"></span>
                                    </label>
                                    
                                </li>
                                <li class="list-group-item">
                                    Banco de dados
                                    <label class="switch ">
                                    <input type="checkbox" class="primary" value="1" <?php if( $incidentes["category_hospedagem_bd"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem_bd" name="category_hospedagem_bd">
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
                                    Plesk linux 1
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin3Win()" <?php if( $incidentes["category_hospedagem_lin1"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem_lin1" name="category_hospedagem_lin1">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>

                                    <li class="list-group-item">
                                    Plesk linux 3
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin1Win()" <?php if( $incidentes["category_hospedagem_lin3"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem_lin3" name="category_hospedagem_lin3">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                    <li class="list-group-item">
                                    Plesk Windows
                                        <label class="switch ">
                                        <input type="checkbox" class="primary" value="1" onclick="desbloquearCheckBoxlin1lin3()" <?php if( $incidentes["category_hospedagem_win"] == 1  ){ ?>checked<?php } ?> id="category_hospedagem_win" name="category_hospedagem_win">
                                        <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>
                            </ul>
                        </div>                        
                          
                        <div class="col-md-4">

                            <div class="card-header"><h3>Previsões</h3></div>

                            <div class="form-group" id="http">
                                <label for="previsao">Previsão Http</label>
                                <input type="text" class="form-control" id="previsao_http" value="<?php echo htmlspecialchars( $incidentes["previsao_http"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_http" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            <div class="form-group" id="bd">
                                <label for="previsao">Previsão Banco de dados</label>
                                <input type="text" class="form-control" id="previsao_bd" value="<?php echo htmlspecialchars( $incidentes["previsao_bd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_bd" placeholder="Digite a previsao" style="width: 150px">
                            </div>

                            

                            
                        </div>
                       
          
                        <div class="col-md-12">
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
    function desbloquearCheckBoxlin3Win(){
        document.getElementById('category_hospedagem_lin3').checked = false;
        document.getElementById('category_hospedagem_win').checked = false;
    }

    function desbloquearCheckBoxlin1Win(){
        document.getElementById('category_hospedagem_lin1').checked = false;
        document.getElementById('category_hospedagem_win').checked = false;
    }

    function desbloquearCheckBoxlin1lin3(){
        document.getElementById('category_hospedagem_lin3').checked = false;
        document.getElementById('category_hospedagem_lin1').checked = false;
    }
    </script>