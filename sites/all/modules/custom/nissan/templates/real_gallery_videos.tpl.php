<html>
<link rel="stylesheet" type="text/css" href="sites/all/modules/custom/nissan/css/style.css">
    <body>
    <div class="container">
        <div class="row">
    		<div class="col-md-12">
                    <div id="Carousel" class="carousel slide">
                     <?php $view = views_get_view('nissan_galeria', true); $view->execute(); module_load_include('inc', 'webform', 'includes/webform.submissions'); 
                           $count =  count($view->result); ?>
                      
                      <ol class="carousel-indicators">   
                          <?php $numero = 6; ?>
                          <?php for($i = 0; $i <= $count; $i++): ?>
                              <?php if($i%$numero==0): ?>
                                  <li data-target="#Carousel" data-slide-to="<?php print($i); ?>"></li>
                              <?php  endif ?>
                          <?php endfor ?> 
                      </ol>                   

                    <div class="carousel-inner">
                    <?php $url = 'http://localhost/nissan/sites/default/files/webform/SampleVideo_1280x720_1mb_6.mp4'; ?>
                        <div class="item active">
                            <div class="row">
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                            </div><!--.row-->
                            <div class="row">
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                              <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                            </div><!--.row-->                        
                        </div><!--.item-->

                            <?php foreach ($view->result as $key => $value): ?>
                                <?php $data = webform_get_submission($value->node_nid, $value->webform_submissions_serial);
                                      $file = file_load($data->data[21][0]);    
                                      $url = file_create_url($file->uri); 
                                ?>
                                      
                                 <div class="item">
                                    <div class="row">
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                    </div><!--.row-->
                                    <div class="row">
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                      <div class="col-md-4"><a class="thumbnail"><?php print(rendervideo($url)); ?></a></div>
                                    </div><!--.row-->                        
                                </div><!--.item-->                                  
                              <?php  endforeach ?>
                  
                    </div><!--.carousel-inner-->
                      <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                      <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                    </div><!--.Carousel-->
                     
    		</div>
    	</div>
    </div><!--.container-->
    </body>
</html>

<?php 
function rendervideo($url){
        $render = theme('videojs', array(
          'items' => array(
            array(
              'uri' => "http://localhost/nissan/sites/default/files/webform/SampleVideo_1280x720_1mb_6.mp4",
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