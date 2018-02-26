<!-- version estable -->
<html>
<link rel="stylesheet" type="text/css" href="sites/all/modules/custom/nissan/css/style.css">
  <body>
    <div class="container">
        <div class="row">
               <div class="col-md-12">
                    <div id="Carousel" class="carousel slide">

                    <div class="subtitulo nissan" style="text-align: center"> <p>Aquí están algunas de las jugadas más emocionantes hasta ahora</p></div/>
                     <?php $view = views_get_view('nissan_galeria', true); $view->execute(); module_load_include('inc', 'webform', 'includes/webform.submissions'); 
                           $count =  count($view->result);?>
                      
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
                                   if (isset($data->data[21][0])) {
                                       $file = file_load($data->data[21][0]);  $url = file_create_url($file->uri);
                                   }
                              ?>
                              <!-- Start 6 items sliders -->
                                      <?php  if($key == FALSE): ?>
                                  <div class="item active">
                                    <div class="row">
                                      <?php endif ?>   
                                        <?php  if($key <= 2): ?>
                                            <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                        <?php endif ?>                                      
                                            <?php  if($key == 3): ?>
                                    </div>
                                            <?php endif ?> 
                                    
                                         <?php  if($key == 3): ?>
                                    <div class="row">
                                         <?php endif ?>

                                         <?php  if($key >= 3 && $key <= 5): ?>
                                            <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                         <?php endif ?>  

                              <!-- End  6 items sliders -->

                                     <!-- Codec Programing Slider -->      
                                 <?php  if ($key == 6):  ?>
                                     <?php $init =6;  $start = 6;  $top= 12;     $multiplo = 9;   $mayor_mul = 11; $menor_mul = 8; ?> 
                                           </div>
                                        </div> 
                                  <?php endif; ?>


                                 <?php  if ($key == 12):  ?>
                                     <?php $init =12;  $start = 12;  $top= 18;     $multiplo = 15;   $mayor_mul = 17; $menor_mul = 14; ?> 
                                           </div>
                                        </div> 

                                  <?php endif; ?>

                                 <?php  if ($key == 18):  ?>
                                     <?php $init =18;  $start = 18;  $top= 24;     $multiplo = 21;   $mayor_mul = 23; $menor_mul = 20; ?> 
                                           </div>
                                        </div> 
                                  <?php endif; ?>


                              <!-- Codec Programing Slider -->
                                       <?php if(isset($init) && $key == $init): ?>
                                  <div class="item">
                                    
                                    <div class="row">
                                       <?php endif  ?>
                                       <?php if(isset($start) && $key >= $start &&  $key <= $menor_mul): ?>
                                             <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                       <?php endif ?>

                                       <?php if(isset($multiplo) && $key == $multiplo): ?>
                                    </div>
                                    <div class="row">
                                       <?php endif ?>
                                      
                                       <?php if(isset($multiplo) && $key >= $multiplo &&  $key <= $mayor_mul): ?>
                                             <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                       <?php endif ?>                                     
                                       
                                       <?php if(isset($top) && $key == $top): ?> 
                                    </div>  
                                  </div>
                                       <?php endif ?>  
            


                                    



                              <?php endforeach ?>
                        </div><!--.carousel-inner-->
             </div><!-- Carrrusel -->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                 <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>

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
            'loop' => FALSE,
            'autoplay' => FALSE,
            'preload' => 'none',
            'hidecontrols' => FALSE,
          ),
        ));

        return $render;
}
?>