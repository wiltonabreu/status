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
                            <h3>Painel de Controle</h3>                            
                                
                            <ul class="list-group list-group-flush">

                                
                                <li class="list-group-item ">                                    
                                    <label class="switch ">
                                    <input  type="checkbox" class="primary primary_email" value="1" <?php if( $incidentes["category_painel"] == 1  ){ ?>checked<?php } ?> id="category_painel" name="category_painel">
                                    <span class="slider round"></span>
                                    </label>
                                </li>   
                                
                            </ul>
                        </div>            
                          
                        <div class="col-md-4">                         

                            <div class="form-group" id="http">
                                <label for="previsao"><h3>Previsão painel</h3></label>
                                <input type="text" class="form-control" id="previsao_painel" value="<?php echo htmlspecialchars( $incidentes["previsao_painel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="previsao_painel" placeholder="Digite a previsao" style="width: 150px">
                            </div>
                            
                        </div>
          
                        
                      
                    </div>

                    <div class="form-group grupstatus">
                            <label for="status_service"><h3>Status</h3></label>                      
                            <select class="form-control" id="status_service" name="status_service" value="<?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 150px" >
                                  <option selected><?php echo htmlspecialchars( $incidentes["status_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                  <option value=0>Resolvido</option>
                                  <option value=1>Em Análise</option>                                
                            </select>
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