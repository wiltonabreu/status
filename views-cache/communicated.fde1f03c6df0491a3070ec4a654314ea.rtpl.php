<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">              
              

            <?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>					
              <p class="font-italic text-sm-left text-black-50">Criado: <?php echo htmlspecialchars( $value1["dt_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							<h5 class="card-subtitle text-dark text-center titulo"> <?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </h5>
							<p class="card-text"><?php echo nl2br(str_replace("<br />","<br>\\r\\n",$value1["descricao"])); ?></p>
				    <?php } ?>

              
            </div>
          </div>
        </div>
    </section>
      