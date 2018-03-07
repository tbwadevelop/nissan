<html>
<link rel="stylesheet" type="text/css" href="sites/all/modules/custom/nissan/css/style.css">
  <body>
    <div class="container">
     <?php 
        // Query videos Aprovados.
        $result = db_select('webform_submitted_data', 'c')
                 ->condition('cid', 41, '=') 
                 ->fields('c') 
                 ->execute()
                 ->fetchAll();


          $sids  = '';     
          foreach ($result as $key => $value) {
            if ($value->data == true) {
               $sids .= $value->sid . "+";
            }
          }
        
          $cadena = $sids;
          if (substr($cadena, -1) == '+') {
            $sids = substr($cadena, 0, -1);
          }
          $view = views_get_view('nissan_galeria');
          $view->set_display("page");
          $view->set_arguments(array($sids));
          $view->pre_execute();
          $view->execute(); 

          module_load_include('inc', 'webform', 'includes/webform.submissions'); 
          $count = count($view->result); 
      ?>
        <?php Global $user; ?>
        <?php if($count != FALSE && $user->uid == true): ?>
          <div class="row">
                 <div class="col-md-12">
                      <div class="subtitulo nissan" style="text-align: center"> <p>Aquí están algunas de las jugadas más emocionantes hasta ahora.</p></div/>
                      <div id="Carousel" class="carousel slide">
                         <ol class="carousel-indicators">   
                            <?php $cantidad_group_items = 6; ?>
                            <?php for($i = 0; $i <= $count; $i++): ?>
                                <?php if($i%$cantidad_group_items==0 && $i == FALSE): ?>
                                    <li class="active" data-target="#Carousel" data-slide-to="<?php print($i); ?>"></li>
                                    <?php $item = $i; ?>
                                <?php  endif ?>
                                <?php if($i%$cantidad_group_items==0 && $i != FALSE): ?>
                                    <?php $item = $item+1; ?>
                                    <li data-target="#Carousel" data-slide-to="<?php print($item); ?>"></li>
                                <?php  endif ?>                              
                            <?php endfor ?> 
                        </ol>                
                             <div class="carousel-inner">
                                <?php foreach ($view->result as $key => $value): ?>
                                    <?php $data = webform_get_submission($value->node_nid, $value->webform_submissions_serial);
                                         $nombre_participante = $data->data[15][0];
                                     if (isset($data->data[21][0])) {
                                         $ciudad = $data->data[8][0];
                                         $file = file_load($data->data[21][0]);  $url = file_create_url($file->uri);
                                     }
                                ?>
                                <!-- Start 6 items sliders -->
                                        <?php  if($key == FALSE): ?>
                                    <div class="item active">
                                      <div class="row">
                                        <?php endif ?>   
                                          <?php  if($key <= 2): ?>
                                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a><p class="p-nombre"><?php print($nombre_participante); ?></p><p class="p-lugar"><?php print_r($ciudad); ?></p> 
                                              <div class="social-networks">
                                                  <a class="facebook" name="<?php print($url);?>"><span>Facebook</span></a>
                                                    <a class="twitter-share-button twitter"
                                                      href="https://twitter.com/share"
                                                      data-size="large"
                                                      data-text="custom share text"
                                                      data-url="https://hechosdeemocion.com/node/8"
                                                      data-hashtags="example,demo"
                                                      data-via="twitterdev"
                                                      data-related="twitterapi,twitter">
                                                    </a>
                                              </div>    
                                              </div>
                                          <?php endif ?>                                      
                                              <?php  if($key == 3): ?>
                                      </div>
                                              <?php endif ?> 
                                      
                                           <?php  if($key == 3): ?>
                                      <div class="row">
                                           <?php endif ?>

                                           <?php  if($key >= 3 && $key <= 5): ?>
                                               <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a><p class="p-nombre"><?php print($nombre_participante); ?></p><p class="p-lugar"><?php print_r($ciudad); ?></p> 
                                                  <div class="social-networks">
                                                    <a class="facebook" name="<?php print($url);?>"><span>Facebook</span></a>
                                                    <a class="twitter-share-button twitter"
                                                      href="https://twitter.com/share"
                                                      data-size="large"
                                                      data-text="custom share text"
                                                      data-url="https://hechosdeemocion.com/node/8"
                                                      data-hashtags="example,demo"
                                                      data-via="twitterdev"
                                                      data-related="twitterapi,twitter">
                                                    </a>
                                                  </div> 
                                               </div>
                                           <?php endif ?>  
                                <!-- End  6 items sliders -->

                                  <!-- Star Logica Multiplos 6 -->
                                   <?php $total = count($view->result);?>         
                                  <?php  if ($key%6==0 && $key != FALSE): ?>
                                     <?php $init=$key;  $start = $key;  $top= $key+6; $multiplo = $key+3;  $mayor_mul = $multiplo+2; $menor_mul = $multiplo-1; ?> 
                                        </div></div> 
                                    <?php endif; ?>
                                  <!-- End Logica Multiplos 6 -->   

                                <!-- Codec Programing Slider -->
                                         <?php if(isset($init) && $key == $init): ?>
                                    <div class="item">
                                      <div class="row">
                                         <?php endif  ?>
                                         <?php if(isset($start) && $key >= $start &&  $key <= $menor_mul): ?>
                                               <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a><p class="p-nombre"><?php print($nombre_participante);?></p><p class="p-lugar"><?php print_r($ciudad); ?></p> 
                                                  <div class="social-networks">
                                                       <a class="facebook" name="<?php print($url); ?>"><span>Facebook</span></a>
                                                        <a class="twitter-share-button twitter"
                                                          href="https://twitter.com/share"
                                                          data-size="large"
                                                          data-text="custom share text"
                                                          data-url="https://hechosdeemocion.com/node/8"
                                                          data-hashtags="example,demo"
                                                          data-via="twitterdev"
                                                          data-related="twitterapi,twitter">
                                                        </a>
                                                  </div>                                                   
                                               </div>
                                         <?php endif ?>

                                         <?php if(isset($multiplo) && $key == $multiplo): ?>
                                      </div>
                                      <div class="row">
                                         <?php endif ?>
                                        
                                         <?php if(isset($multiplo) && $key >= $multiplo &&  $key <= $mayor_mul): ?>
                                                <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a><p class="p-nombre"><?php print($nombre_participante);?></p><p class="p-lugar"><?php print_r($ciudad); ?></p> 
                                                  <div class="social-networks">
                                                    <a class="facebook" name="<?php print($url);?>"><span>Facebook</span></a>
                                                    <a class="twitter-share-button twitter"
                                                      href="https://twitter.com/share"
                                                      data-size="large"
                                                      data-text="custom share text"
                                                      data-url="https://hechosdeemocion.com/node/8"
                                                      data-hashtags="example,demo"
                                                      data-via="twitterdev"
                                                      data-related="twitterapi,twitter">
                                                    </a>
                                                  </div>                                                   
                                                </div>
                                         <?php endif ?>                                     
                                         <?php if(isset($top) && $key == $top): ?> 
                                      </div>  
                                    </div>
                                         <?php endif ?>
                                     <?php if($key == $total-1): ?>
                                       </div></div>
                                     <?php endif ?>    
                                <?php endforeach ?>
                          </div><!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                   <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
          </div><!-- Carrrusel -->
        <?php endif ?>
        </div>  <!-- col-md-12 -->
     </div> <!-- row -->
  </div>
  <!--.container-->
</body>
</html>
<?php 
function rendervideo($url){
    $render = theme('videojs', array(
      'items' => array(
        array(
          'uri' => $url,
          'filemime' => 'video/mp4',
        ),
      ),
      'player_id' => 'test-video',
      'posterimage_style' => 'thumbnail',
      'attributes' => array(
        'width' => '100',
        'height' => '100',
        'loop' => TRUE,
        'preload' => "auto",
        'autoplay' => FALSE,
        'hidecontrols' => FALSE,
      ),
    ));
  return $render;
}
?>