<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->    
</body>
</html>
<script>          
                
  function toggle(sDivId) {
        var oDiv = document.getElementById(sDivId);
        oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";             
                        
  }       

  function desbloquearCheckBoxEmail(){  
    
                  
      document.getElementById('category_email').checked = true;
                    
      document.getElementById('category_hospedagem').checked = false;
      document.getElementById('category_hospedagem_http').checked = false;
      document.getElementById('category_hospedagem_bd').checked = false;            
      document.getElementById('category_hospedagem_lin1').checked = false;
      document.getElementById('category_hospedagem_lin3').checked = false;
      document.getElementById('category_hospedagem_win').checked = false;

      

      document.getElementById('category_backup').checked = false;

      var http = document.getElementById('http');
      http.style.display = "none";
      document.getElementById('previsao_http').value = "";

      var bd = document.getElementById('bd');
      bd.style.display = "none";
      document.getElementById('previsao_bd').value = "";

      

      var backup = document.getElementById('backup');
      backup.style.display = "none";
      document.getElementById('previsao_backup').value = "";

      document.getElementById('category_painel').checked = false;
    var painel = document.getElementById('painel');
    painel.style.display = "none";
    document.getElementById('previsao_painel').value = "";

  }

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

    document.getElementById('category_painel').checked = false;
    var painel = document.getElementById('painel');
    painel.style.display = "none";
    document.getElementById('previsao_painel').value = "";
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
    document.getElementById('category_hospedagem_bd').checked = false;
    
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

    var bd = document.getElementById('bd');
    bd.style.display = "none";
    document.getElementById('previsao_bd').value = "";

    document.getElementById('category_painel').checked = false;
    var painel = document.getElementById('painel');
    painel.style.display = "none";
    document.getElementById('previsao_painel').value = "";

    
}

function desbloquearCheckBoxPainel(){  
  
  document.getElementById('category_backup').checked = false;
  var backup = document.getElementById('backup');
    backup.style.display = "none";
    document.getElementById('previsao_backup').value = ""; 
               
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
  document.getElementById('category_hospedagem_bd').checked = false;
  
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

  var bd = document.getElementById('bd');
  bd.style.display = "none";
  document.getElementById('previsao_bd').value = "";

  
}



</script>