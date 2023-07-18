

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



/*requires a page which includes

$bloglink
$blogs

$maxToShow = 6;
$featuredFirst = true;

if maxToShow or featuredfirst are missing all are returned

*/

if (!isset($maxToShow)){

    $maxToShow = 3;


}

$posts = get_posts('numberposts=' . $maxToShow . '&order=DESC&category=5');

//var_dump($posts);


$blogsToShow = $blogLink->getActiveBlogs($maxToShow, $featuredFirst, FALSE);



$images = [

    1 => [0 => '/assets/img/blog/cards/colonoscopy_800x600.png', ], //Colon Tutor
    2 => [0 => '/assets/img/blog/cards/polypectomy_800x600.png', 1 => '/assets/img/blog/cards/polypectomy2_800x600.png'],//Polyp Tutor
    3 => [0 => '/assets/img/blog/cards/imaging_800x600.png', ], //Imaging Tutor
    4 => [0 => '/assets/img/blog/cards/gastroscopy_800x600.png' ], //Gastroscopy Tutor
    5 => [0 => '/assets/img/blog/cards/the_gieqs_blog.png'], //GIEQs Topics Tutor
    6 => '', //Nursing Tutor
    7 => '', //ERCP Tutor
    8 => '', //EUS Tutor
    9 => '', //Therapeutic EUS Tutor
    10 => '', //Complex Resection Tutor
    11 => '', //Submucosal Endoscopy Tutor
    0 => '', //Video Nav


  ];


//print_r($blogsToShow);

$a=1;
$b=count($posts);

if ($b == 0){

    ?>

                <div class="row">
                    <p>No blogs yet</p>
                </div>


                <?php
   
   exit();

  }

  foreach ($posts as $post) : setup_postdata( $post ); 

  $post_id = get_the_ID();

  if ($a == 1){
    ?>
    
                    <div class="row">
    
    
                        <?php
    
      }

      ?>


      <div class="col-lg-4 blog-card">
      <div class="card hover-shadow-lg hover-translate-y-n10"
          data-blog-id="<?php echo $post_id;?>">
          <a href="<?php echo BASE_URL;?>/blogs/<?php echo $post_id;?>">
             <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
             
          </a>
          <div class="card-body py-5 text-center">
              <a href="<?php echo BASE_URL;?>/blogs/<?php echo $post_id;?>" class="d-block h5 <?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'lh-150';} ?>"><?php the_title(); ?></a>
             


              <h6 class="<?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'text-muted';} ?> mt-4 mb-0">
                  <?php echo get_the_author();?></h6>

              <h6 class="<?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'text-muted';} ?> mt-4 mb-0"><?php the_date();?></h6>
          </div>
       

      </div>
</div>



<?php





      if (($a % 3 == 0) ){
        ?>
        
                            </div>
                            <div class="row">
        
                            <?php
        
          }
        
          $a++;

endforeach;







?>

<script>

$(document).ready(function() {

    $(document).on('click', '.card', function() {

        /* event.preventDefault();
        var id = $(this).attr('data-blog-id');

        window.location.href = siteRoot2 + "blogs/"+id; */


    })


})



</script>