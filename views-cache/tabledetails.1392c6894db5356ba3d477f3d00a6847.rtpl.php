<?php if(!class_exists('Rain\Tpl')){exit;}?><section>

<div class="row clearfix">
<div class="col-md-12 column">
<div class="list-group">
<ul class="list-group">
<li class="list-group-item">

<div class="table-responsive-sm">
<table
        class="table table-sm table-striped table-bordered table-condensed table-hover">
        <tr>

                <th scope="col">Servidores</th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                IMAP</span></th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                POP</span></th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                SMTP</span></th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                Webmail</span></th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                Colaboração</span></th>
                <th scope="col"> <span class="d-flex justify-content-center">
                                Fila</span></th>
        </tr>

        <tr>

                <td>
                        <h5><span class="cluster-email">Mail 01</span>
                        </h5>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataImapMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataImapMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataImapMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataPopMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataPopMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataPopMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataSmtpMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataSmtpMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataSmtpMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataWebmailMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataWebmailMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataWebmailMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataEasMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataEasMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataEasMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>    
                        <div class="d-flex justify-content-center">
                                        <span class="<?php echo htmlspecialchars( $dataFilaMail01['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataFilaMail01['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                        <a href="email">
                                                <i class="fas fa-plus-circle fa-lg"
                                                        title="Previsão: <?php echo htmlspecialchars( $dataFilaMail01['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                        data-toggle="tooltip"
                                                        data-placement="bottom"></i>
                                        </a>
                        </div>
                </td>
        </tr>

        <tr>
                <td>
                        <h5><span class="cluster-email">Mail 02</span>
                        </h5>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataImapMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataImapMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataImapMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataPopMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataPopMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataPopMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataSmtpMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataSmtpMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataSmtpMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataWebmailMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataWebmailMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataWebmailMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataEasMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataEasMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataEasMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>    
                        <div class="d-flex justify-content-center">
                                        <span class="<?php echo htmlspecialchars( $dataFilaMail02['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataFilaMail02['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                        <a href="email">
                                                <i class="fas fa-plus-circle fa-lg"
                                                        title="Previsão: <?php echo htmlspecialchars( $dataFilaMail02['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                        data-toggle="tooltip"
                                                        data-placement="bottom"></i>
                                        </a>
                        </div>
                </td>
        </tr>

        <tr>
                <td>
                        <h5><span class="cluster-email">Mail 03</span>
                        </h5>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataImapMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataImapMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataImapMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataPopMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataPopMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataPopMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataSmtpMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataSmtpMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataSmtpMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>

                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataWebmailMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataWebmailMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataWebmailMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>
                        <div class="d-flex justify-content-center">
                                <span class="<?php echo htmlspecialchars( $dataEasMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataEasMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                <a href="email">
                                        <i class="fas fa-plus-circle fa-lg"
                                                title="Previsão: <?php echo htmlspecialchars( $dataEasMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                data-toggle="tooltip"
                                                data-placement="bottom"></i>
                                </a>
                        </div>
                </td>
                <td>    
                        <div class="d-flex justify-content-center">
                                        <span class="<?php echo htmlspecialchars( $dataFilaMail03['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataFilaMail03['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                        <a href="email">
                                                <i class="fas fa-plus-circle fa-lg"
                                                        title="Previsão: <?php echo htmlspecialchars( $dataFilaMail03['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                        data-toggle="tooltip"
                                                        data-placement="bottom"></i>
                                        </a>
                        </div>
                </td>
        </tr>
</table>
</div>
</li>
</ul>

</div>
</div>
</div>

</section>