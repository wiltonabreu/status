<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Comunicados
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Comunicado</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/communicated/<?php echo htmlspecialchars( $communicated["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                    <div class="box-body">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo" value="<?php echo htmlspecialchars( $communicated["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>
                            <div class="form-group">
                              <label for="descricao">Descrição</label>                      
                              <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"><?php echo htmlspecialchars( $communicated["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
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