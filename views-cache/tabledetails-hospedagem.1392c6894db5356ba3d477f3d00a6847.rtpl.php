<?php if(!class_exists('Rain\Tpl')){exit;}?><section>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="list-group">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="secundarytable">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <th><span class="d-flex justify-content-center">Servidores</span></th>
                                <th><span class="d-flex justify-content-center">HTTP</span></th>
                                <th><span class="d-flex justify-content-center">Banco de dados</span></th>


                            </tr>

                            <tr>
                                <td>
                                    <h5><span class="cluster-email">Linux 1</span></h5>
                                </td>
                                
                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataHttpLin1['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataHttpLin1['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataHttpLin1['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"></i>
                                            </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataBdLin1['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataBdLin1['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataBdLin1['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"></i>
                                            </a>
                                    </div>
                                </td>




                            </tr>

                            <tr>
                                <td>
                                    <h5><span class="cluster-email">Linux 3</span></h5>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataHttpLin3['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataHttpLin3['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataHttpLin3['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"></i>
                                            </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataBdLin3['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataBdLin3['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataBdLin3['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"></i>
                                            </a>
                                    </div>
                                </td>




                            </tr>

                            <tr>
                                <td>
                                    <h5><span class="cluster-email">Windows</span></h5>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataHttpWin['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataHttpWin['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataHttpWin['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"></i>
                                            </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                            <span class="<?php echo htmlspecialchars( $dataBdWin['status'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $dataBdWin['message'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                            <a href="email">
                                                    <i class="fas fa-plus-circle fa-lg"
                                                            title="Previsão: <?php echo htmlspecialchars( $dataBdWin['previsao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
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