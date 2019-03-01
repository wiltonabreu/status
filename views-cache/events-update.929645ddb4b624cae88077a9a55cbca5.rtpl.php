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