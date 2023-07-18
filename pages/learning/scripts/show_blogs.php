

<?php

/*requires a page which includes

$bloglink
$blogs

$maxToShow = 6;
$featuredFirst = true;

if maxToShow or featuredfirst are missing all are returned

*/

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
$b=count($blogsToShow);

foreach ($blogsToShow as $key=>$value){

?>




                <?php


  //show the row

  if ($b == 0){

    ?>

                <div class="row">
                    <p>No blogs yet</p>
                </div>


                <?php
    
  }

  if ($a == 1){
?>

                <div class="row">


                    <?php

  }

  $blogs->Load_from_key($value['id']);

  $blog_date = new DateTime($blogs->getcreated());
               $blog_date_readable = date_format($blog_date, "jS F Y");

  

 $countImagesArray = count($images[$blogs->getsubject()]) - 1;
 $random_number = mt_rand(0, $countImagesArray);



?>


                    <div class="col-lg-4">
                        <div class="card <?php if ($blogs->getfeatured() == '1'){echo 'bg-gieqsGold text-dark';} ?> hover-shadow-lg hover-translate-y-n10"
                            data-blog-id="<?php echo $value['id'];?>">
                            <?php if ($blogs->getfeatured() == '1'){ ?>
                            <p class="badge bg-gieqsGold text-dark position-absolute" style="right:15px; top:15px;">Featured Post</p>
                            <?php } ?>
                            <a href="#">
                                <img alt="Image placeholder" src="<?php echo BASE_URL . $images[$blogs->getsubject()][$random_number];?>"
                                    class="card-img-top">
                            </a>
                            <div class="card-body py-5 text-center">
                                <a href="#" class="d-block h5 <?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'lh-150';} ?>"><?php echo $blogs->getname();?></a>
                                <?php $users->Load_from_key($blogs->getauthor());?>


                                <h6 class="<?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'text-muted';} ?> mt-4 mb-0">
                                    <?php echo $users->getfirstname() . ' ' . $users->getsurname();?></h6>

                                <h6 class="<?php if ($blogs->getfeatured() == '1'){echo 'text-dark';}else{ echo 'text-muted';} ?> mt-4 mb-0"><?php echo $blog_date_readable;?></h6>
                            </div>
                            <!--  <div class="card-footer delimiter-top">
                <div class="row">
                  <div class="col text-center">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item pr-4">
                        <a href="#" class="text-muted"><i class="fas fa-share mr-1 text-muted"></i> 131</a>
                      </li>
                      <li class="list-inline-item pr-4">
                        <a href="#" class="text-muted"><i class="fas fa-eye mr-1 text-muted"></i> 255</a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="text-muted"><i class="fas fa-comments mr-1 text-muted"></i> 14</a>
                      </li>
                    </ul>
                  </div>
                </div> -->

                        </div>
</div>





                        <?php



  //end the row

  if (($a % 3 == 0) ){
?>

                    </div>
                    <div class="row">

                    <?php

  }

  $a++;

  



}







?>

<script>

$(document).ready(function() {

    $(document).on('click', '.card', function() {

        event.preventDefault();
        var id = $(this).attr('data-blog-id');

        window.location.href = siteRoot + "blog_article.php?id="+id;


    })


})



</script>