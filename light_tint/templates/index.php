
<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app="myApp">
  <head>
    <meta charset="utf-8">
     <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

     <meta name="author" content="Joshua Childs">
     <meta name="description" content="A comprehensive website/application for the 2018 UVM CS Fair.
           This site uses a RPi to turn off and on Smart Tint with a photocell." >
     <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" href="css/custom.css" >

     <!-- %%%%%%%%%%%% LINKS FOR WEB APP %%%%%%%%%%%%-->
     <script data-require="angular.js@1.4.8" data-semver="1.4.8" src="https://code.angularjs.org/1.4.8/angular.js"></script>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.css" /> -->
     <script src="../static/Controller.js"></script>
     <link rel="stylesheet" href="/static/style.css" />
     <!-- %%%%%%%%%%%% LINKS FOR WEB APP %%%%%%%%%%%%-->

     <title>Light Tint</title>
  </head>



  <body>

    <header>

      <nav class = "navbar navbar-expand-lg navbar-light">

            <a href = "index.php" class = "navbar-brand ml-3 "> <span style = "color:black;">LIGH</span><span style = "color:rgb(0,100,250);">T</span><span style = "color:black;">INT</span> </a>

            <button class = "navbar-toggler" type="button" data-toggle="collapse" data-target = "#navbarMenu"
            aria-controls="navbarMenu" aria-expanded = "false" aria-label="Toggle Navigation">

            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <div class="collapse navbar-collapse"></div>  THIS "CENTERS THE NAV"-->
            <!-- Below is code for the collapsable navbarMenu, try resizing page so you you can see the "hamburger" button.-->
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mr-auto" >
                <li class="nav-item active">
                  <a href="index.php" class="nav-link">Home </a>
                </li>
                <li class="nav-item">
                  <a href="new_index.php" class="nav-link">Application</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Code</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">References</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Contact Us</a>
                </li>

              </ul>

              <form action = "new_index.php" method="get" class="form-inline my-2 my-lg-0">
                <button class="btn menu-right-btn border" type="submit">
                  Application
                </button>
              </form>

            </div>

          </nav>


    </header>


  <main>

    <div class ="container-fluid p-0" id="top" >
      <div class = "site-content">

        <div class="d-flex justify-content-center">
          <div class="d-flex flex-column">

            <h1 class="site-title"> Dimming the Lights </h1>
            <p class="site-desc"> Using light to activate Smart Tint technology. </p>

            <div class="d-flex flex-row">
              <a href="#feature" class="btn site-btn2 px-4 py-3 mr-3 btn-light" role="button">Special Features</a>
              <a href="#process" class="btn site-btn1 px-4 py-3 mr-3 btn-light" role="button">Our Process</a>
            </div>

          </div>
        </div>
      </div>
    </div>
<!--****************************START SECTION 1******************************-->
     <div class="section-1" id="feature">
       <div class="container text-center">
         <h1 class= "heading-1">Features</h1>
         <h1 class="heading-2"> Smart Tint Technology </h1>

         <p class="para-1">
          Smart film is an adhesive made from clear protective layers surrounding a layer of a combination of
          liquid crystal and polymer. In its natural state, the liquid crystal is disorganized, and blocks light,
          making the film opaque. When a current is run through the film, the crystals align along the electromagnetic
          field created by the current, allowing light in, and making the glass translucent.

         </p>

         <div class="row justify-content-center text-center">

           <div class="col-md-4">
             <div class="card">
               <img src="images/office.jpg" alt="Office Setting" class="card-img-top">
               <div class="card-body">
                 <h4 class="card-title"> Boost Productivity </h4>
                 <p class="card-text">
                   Make any space feel larger and smaller based on your desired settings and get work done!
                 </p>
               </div>
             </div>
           </div>

           <div class="col-md-4">
             <div class="card">
               <img src="images/brown-contemporary-curtains-910458.jpg" alt="UV Rays" class="card-img-top">
               <div class="card-body">
                 <h4 class="card-title"> Block UV Rays </h4>
                 <p class="card-text">
                   Having a photocell switch off your smart tint during the day helps
                   block UV Rays during the day and save costs.
                 </p>
               </div>
             </div>
           </div>

           <div class="col-md-4">
             <div class="card">
               <img src="images/electricity.jpg" alt="Electricity Usage" class="card-img-top">
               <div class="card-body">
                 <h4 class="card-title"> Save Costs </h4>
                 <p class="card-text">
                   Automate your Smart Tint and reduce your Air Condition bill in the Summer with our
                   photocell design.

                 </p>
               </div>
             </div>
           </div>

           <div class="container text-center">
             <a href="#process" class="btn btn-primary " role="button">Our Process</a>
             <a href="#top" class="btn btn-primary " role="button">Back To Top</a>
           </div>
         </div>

       </div>
     </div>

<!--****************************END SECTION 1********************************-->



<!--****************************START SECTION 2 (STEP ONE)*******************-->

     <div class="section-2 bg-light" id="process">
       <div class="container">
         <h1 class= "heading-1 text-center"> Development Process </h1>
         <h1 class="heading-2 text-center"> Step One </h1>
         <hr>
         <div class="row">
           <div class="col-md-7">
             <img src="../images/rpi.jpeg" alt="Light Lamps">
           </div>
           <div class="col-md-5">
             <h1 class="text-black"> Proof of Concept </h1>
             <!-- <a href="#">Join Us</a> -->
             <p class="para-1">
               In order to be realistic about our ideas, we had to test the most basic yet essential components of the project.  The photocell performed just as hoped and the Smart Tint device arrived from the manufacturer intact and functional.
            </p>
            <a href="#step2" class="btn btn-primary" role="button">Next</a>

            <a href="#top" class="btn btn-primary" role="button">Back To Top</a>
           </div>
         </div>
       </div>
     </div>
<!--****************************END SECTION 2 (STEP ONE)*********************-->
<!--****************************START SECTION 2a (STEP TWO)******************-->

     <div class="section-2a bg-light" id="step2">
       <div class="container">
         <h1 class= "heading-1 text-center">   </h1>
         <h1 class="heading-2 text-center"> Step Two </h1>
         <hr>
         <div class="row">
           <div class="col-md-7">
             <img src="../images/rpi.jpeg" alt="Light Lamps">
           </div>
           <div class="col-md-5">
             <h1 class="text-black"> Assembly and Wiring </h1>
             <!-- <a href="#">Join Us</a> -->
             <p class="para-1">
               The next task was to actually connect the Smart Tint device to our RBPi, which involved cutting out the original switch that shipped with the device and stripping the wires.  A Relay was used as a bridge between the RBPi’s GPIO breadboard and Smart Tint device in order to provide the correct voltage (60V AC).
            </p>

            <a href="#step3" class="btn btn-primary" role="button">Next</a>
            <a href="#top" class="btn btn-primary" role="button">Back To Top</a>

           </div>
         </div>
       </div>
     </div>
<!--***************************END SECTION 2a (STEP TWO)*********************-->
<!--****************************START SECTION 2b (STEP THREE)****************-->

     <div class="section-2b bg-light" id="step3">
       <div class="container">
         <h1 class= "heading-1 text-center">   </h1>
         <h1 class="heading-2 text-center">   </h1>
         <hr>
         <div class="row">
           <div class="col-md-7">
             <img src="../images/rpi.jpeg" alt="Light Lamps">
           </div>
           <div class="col-md-5">
             <h1 class="text-black"> Raspberry Pi Control </h1>
             <!-- <a href="#">Join Us</a> -->
             <p class="para-1">
               With the devices connected, commands could be manually sent from the RBPi to activate and deactivate the Smart Tint film.  A script could thenceforth be used to take readings from the photocell and adjust the device accordingly.
            </p>

            <a href="#step4" class="btn btn-primary" role="button">Next</a>
            <a href="#top" class="btn btn-primary" role="button">Back To Top</a>

           </div>
         </div>
       </div>
     </div>
<!--***************************END SECTION 2b (STEP THREE)*******************-->
<!--****************************START SECTION 2c (STEP FOUR)****************-->

     <div class="section-2c bg-light" id="step4">
       <div class="container">
         <h1 class= "heading-1 text-center">   </h1>
         <h1 class="heading-2 text-center"> Step Four </h1>
         <hr>
         <div class="row">
           <div class="col-md-7">
             <img src="../images/rpi.jpeg" alt="Light Lamps">
           </div>
           <div class="col-md-5">
             <h1 class="text-black"> Web Interface </h1>

             <p class="para-1">
               With the device at the ready, we shifted focus to the User Experience.  We designed this web application to be hosted on the RBPi with the Smart Tint device.  In this way, the user can log on remotely on their computer or even via phone/tablet to control the device.
            </p>
            <a href="#top" class="btn btn-primary" role="button">Back To Top</a>

           </div>
         </div>
       </div>
     </div>
<!--***************************END SECTION 2bc(STEP FOUR)*******************-->
<!--***************************START SECTION 3*******************************-->

     <div class="section-3">
       <div class="container-fluid">
         <div class="d-flex justify-content-center">
           <div class="d-flex flex-column m-5">

             <h1 class="heading-1">Comments or Questions?</h1>
             <!-- <p class="para"> Contact Us!</p> -->

             <a href="#" class="btn btn-primary" role="button">Contact Us!</a>
           </div>

         </div>

       </div>


     </div>

<!--***************************END SECTION 3*********************************-->

<!--***************************START SECTION 4*******************************-->


     <div class="section-4">
       <div class="container">
         <!--First Row of Icons-->
         <div class="row">

           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fa fa-globe fa-3x m-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">24/7 Support</h3>
                 <p class="m-2">
                   Shoot us an email anytime and we'll answer your questions as best we can!
                 </p>

               </div>

             </div>
           </div>


           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fa fa-cubes fa-3x m-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">Scalability</h3>
                 <p class="m-2">
                   This prototype is scalable with low overhead.
                 </p>

               </div>

             </div>
           </div>


           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fas fa-space-shuttle fa-3x m-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">Speed</h3>
                 <p class="m-2">
                   Even with a simple Raspberry Pi, response time is quick and efficient.
                 </p>

               </div>

             </div>
           </div>



         </div>

        <!--Second Row of Icons-->
         <div class="row mt-2">

           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fas fa-lock fa-3x m-2 pr-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">Authorized</h3>
                 <p class="m-2">
                This site is secure and streamlined.
                 </p>

               </div>

             </div>
           </div>

           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fas fa-user fa-3x m-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">Community</h3>
                 <p class="m-2">
                   The Raspberry Pi is mostly open source with lots of forums and discussions
                   open to the public.
                 </p>

               </div>

             </div>
           </div>

           <div class="col-md-4">
             <div class="d-flex flex-row">
               <i class="fas fa-tasks fa-3x m-2 pr-2"></i>
               <div class="d-flex flex-column">
                 <h3 class="m-2">Customize</h3>
                 <p class="m-2">
                   This project is only the beginning, make your own edits and let us know!
                 </p>
               </div>
             </div>
           </div>

         </div>
       </div>
     </div>
  <!--***************************End SECTION 4*******************************-->
  <!--***********************START SECTION 5/Footer**************************-->


    <?php
      include("footer.php");
     ?>


   </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../javascript/smooth_scrolling.js"></script>
    <script src="../javascript/jquery-3.3.1.min.js"></script>
    <!-- <script src="../javascript/redirect.js"></script> -->



    <script>
    window.sr = ScrollReveal({duration : 1500});
    sr.reveal('.site-content');
    sr.reveal('.site-content .img');
    sr.reveal('.site-content .d-flex');
    sr.reveal('.navbar .navbar-brand');
    sr.reveal('.section-1 .card');
    sr.reveal('.section-2 .d-flex');
    sr.reveal('.section-2 .container-fluid');
    sr.reveal('.section-2 img');
    sr.reveal('.section-2a img');
    sr.reveal('.section-2b img');
    sr.reveal('.section-2c img');
    sr.reveal('.section-3 .col-md-4');
    sr.reveal('.section-4 .col-md-7, .col-md-5');
    </script>
  </body>
</html>
