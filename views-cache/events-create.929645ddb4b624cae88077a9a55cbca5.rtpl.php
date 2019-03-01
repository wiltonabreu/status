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
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Novo Evento</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/events/create" method="post">
                  <div class="box-body">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Digite a Titulo">
                    </div>
                    <div class="form-group">
                      <label for="descricao">Descrição</label>                      
                      <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a descrição"></textarea>
                    </div>
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
                    <div class="form-group">
                      <label for="category">Categoria</label>
                      
                      <select class="form-control" id="category" name="category" style="width: 150px">
                            <option selected>Selecione...</option>
                            <option value="email">E-mail</option>
                            <option value="hospedagem">Hospedagem</option>
                            <option value="backup">Backup</option>
                      </select>

                    </div>
                    
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                  </div>
                </form>
              </div>
              </div>
          </div>
        
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->