<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

<title>The GIEQs Foundation | Our Mission</title>
	<meta name="description" content="Procedures The mission of the GIEQs Foundation is to improve the safety and efficacy of gastrointestinal endoscopy through training and standardization of training.  We approach this via a yearly Symposium, regular live courses and a state of the art online platform.  We have outreach programs for those who cannot afford to access high quality endoscopy education." >

    
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    <style>
    .logo {

        width: 100%;


    }

    .gieqsGold {

        color: rgb(238, 194, 120);

    }

    .video-thumbnail {
  position: relative;
  display: inline-block;
  cursor: pointer;
  margin: 30px;
    }

    .video-thumbnail::before {
    position:absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    content: "&#9658;";
    font-family: FontAwesome;
    font-size: 100px;
    color: #fff;
    opacity: .8;
    text-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
  }
  .video-thumbnail:hover::before {
    color: ;
  }


    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

            font-size: 1em;
        }

        .tiny {
            font-size: 0.75em;

        }

        .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
        }


    }
    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

    </header>
    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

        


        <!-- Header text 1 -->
        <section class="slice slice-lg pb-2" data-offset-top="#header-main">
      <div class="container pt-6">
        <div class="row justify-content-center">
          <div class="col-md-9">
            <h1 class="lh-150 mb-3">"Quality in endoscopy is about technical competence and evidence-based practice."</h1>
            <p class="lead text-muted mb-0">Whether a diagnostic colonoscopy or placing a self-expanding metal stent for biliary drainage, the principles are the same.</p>
            
            
          </div>

        </div>
      </div>
    </section>
    
    <section class="slice">
      <div class="container">
    
        <div class="row justify-content-center text-justify">
            
          <div class="col-lg-9">
              <hr>
            <!-- Article body -->
            <article>
              <p class="lead">As you will be aware, most Endoscopy symposia focus on visually appealing, resource intensive techniques that are never performed by the majority of endoscopists. As an example, most gastroenterologists may only diagnose a handful of patients with achalasia in their career yet per oral endoscopic myotomy – the novel endoscopic technique to treat achalasia – is demonstrated in most endoscopy symposia [despite the fact that there are fewer than 150 procedures performed per year in Belgium and most gastroenterologists will never see or be involved in one outside of a symposium!].</p>
              <p class="lead">There are many reasons for this discrepancy. Complex techniques are also often visually appealing and the significant endoscopic skill required to perform them may be inspiring to colleagues. It is also true to say that the evidence for many of the strategies we are now beginning to apply to everyday endoscopic practice originated from such complex procedures.</p>
              <h5>'Everyday' endoscopy may present unique challenges</h5>
              <figure class="figure" >
              <!-- <div class="video-thumbnail">   -->
              <a href="https://vimeo.com/370720520" data-fancybox>     
                <img alt="Image placeholder" src="../../assets/img/bleeding/spurtingVessel.png" class="img-fluid rounded">
                </a>
  <!-- </div> -->
                <figcaption class="mt-3 text-muted"><strong>Upper gastrointestinal bleeding:</strong> large perforating vessel in a gastric ulcer continuously spurting blood, seen through the lens of the over-the-scope clip. Recent <a href="javascript:;" data-fancybox data-type="iframe" data-src="https://www.ncbi.nlm.nih.gov/pubmed/?term=29803838">evidence</a> suggests that the over-the-scope clip has impressive rates of haemostasis in such difficult cases.  Press the image to view the entire procedure</figcaption>
              </figure>
              <p class="lead">At GIEQs we believe that there is a need for an international endoscopy congress focused on the techniques that are performed by all endoscopists, every day of their working lives. These include, but are not limited to, painless colonoscopy, small polypectomy, gastroscopy and the detection of early-stage precursors of upper GI cancer, the treatment of gastrointestinal bleeding, etc. An increasing body of evidence underpins both how to perform these techniques and in which situation to apply a particular technique; indeed applying an evidence-based approach may have a long-lasting impact on patient care.</p>
              <p class="lead h6">This is what we mean by quality in Endoscopy – the application of the best available evidence to all endoscopic procedures.</p>
              
              <p class="lead">Unfortunately, around Europe and internationally, common endoscopic techniques are often performed by practitioners who are unaware of this evidence-base and practice non evidence-based techniques, primarily since these were demonstrated during their training. GIEQs aims to address this problem.</p>
              <h5>Patients can be adversely impacted by inadequate training or non-evidence based practice</h5>
              <figure class="figure">
                <!-- <a href="https://vimeo.com/370720520" data-fancybox>      -->
                <img alt="Image placeholder" src="../../assets/img/polyps/panl.png" class="img-fluid rounded" >
                <!-- </a> -->
                <figcaption class="mt-3 text-muted"><strong>Large non-granular colonic laterally spreading tumor:</strong> a huge <a href="javascript:;" data-fancybox data-type="iframe" data-src="https://www.gastrojournal.org/article/S0016-5085(16)35557-3/fulltext">evidence base</a> now underpins the treatment of such lesions.  This lesion has been previously attempted but incompletely resected.  This risks the patient being referred unnecessarily for surgery or an adverse event since the endoscopic approach is now more complicated</figcaption>
              </figure>
              <p class="lead">We believe that by holding a 2-day international symposium with a world-class faculty, focused on everyday techniques in Endoscopy, we can start a renewed drive towards quality in endoscopic procedures in Belgium and throughout Europe. Of course, endoscopy is also a practical discipline, and there is a need for live demonstration of the techniques under discussion in addition to the presentation of evidence.</p>
              <p class="lead">In addition, traditional endoscopy symposia do not commonly encompass specific sessions for trainees. We believe that building quality in a practical discipline such as Endoscopy must focus on training and the evidence behind how to train effectively. At GIEQs we will introduce specific sessions for trainees on the practice and theory behind everyday endoscopy. Furthermore, we will introduce a separate nursing congress for a half day during GIEQs; talks will be focused on the issues relevant to nurses and be given by national and international nursing leaders, in addition to the medical faculty. At GIEQs we believe that quality in endoscopy can only be delivered by education of the whole team delivering the procedure.</p>
              <p class="lead">We are confident that the success of the first edition of this symposium can be the start of an ongoing brand to promote quality in Endoscopy. We do not want to compete with traditional Endoscopy symposia or produce an evidence-base for endoscopic practice (ably performed already by the European Society of Gastrointestinal Endoscopy (ESGE) and national endoscopy societies). Instead we aim to promote the presentation of practical educational materials [face to face, live demonstrations and, in the future, online] enabling practitioners of endoscopy to perform their everyday endoscopy better. We envisage that GIEQs will become a yearly occurrence with the above aims in mind.
We look forward to welcoming independent endoscopists, trainees and endoscopy nurses in the field of gastrointestinal endoscopy!</p>
<p class="lead h6 mb-0 text-right">the GIEQs Organising Committee, 2020</p>
            </article>
           
    </section>

    </div>

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {



    })
    </script>
</body>

</html>