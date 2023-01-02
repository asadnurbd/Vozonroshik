
<section id="home" class="top_banner_bg secondary-bg">

<div class="container">

   <div class="row">

      <div class="col-md-12">

         <div class="top_banner">

         </div>

         <div class="present">

            <center>

               <h1>Emotional Intelligence S.A.L.E Profile Test1 Result</h1>

            </center>

         </div>

      </div>

   </div>

</div>

</section>

<section id="contact" class="contact_bg">
<div class="container result-section">
   <div class="row">
      <div class="col-md-12">
         <div class="main-b">
         <?php if(isset($test) && $test){ ?>
                  <h4 class="text-center">Thank you for completing your profile.</h4>
              <?php }else{ ?>
                  <h4 class="text-center">Your session has timed out.  Please <a href="https://frontierp.com.au/clients/ei_sale">click here</a> to start again.</h4>
              <?php } ?>
         </div>
      </div>
   </div>
</div>
</section>

<div class="page-wrapper">

<div class="container-fluid pt-25">

   <div class="row">

      <div class="col-md-12">

      </div>

   </div>

   <!-- Row -->

   <div class="row">

      <?php echo setSessionsMsg(); ?>

      <div class="col-sm-12">

         <div class="panel panel-default card-view">

            <div class="panel-heading">
<!-- 
               <div class="pull-left">
                  <h6 class="panel-title txt-dark">Emotional Intelligence S.A.L.E Profile Test1 Result</h6>
               </div> -->

               <div class="clearfix"></div>

            </div>

            <div class="panel-wrapper collapse in">

               <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>User : </strong> <?php echo $result['name']; ?></p>
                      <p><strong>Email : </strong> <?php echo $result['email']; ?></p>
                      <p><strong>Company : </strong> <?php echo $result['company_name']; ?></p>
                    </div>
                  </div>
                  <div class="row text-center mt-20">
            <?php $max= (max($result['A'], $result['B'], $result['C'], $result['D']) ) ?>
           
                <?php if($max==$result['A']){?>
                     <div class="col-md-3">
                        <div class="panel panel-default card-view">
                          <div class="panel-body">
                            <h3><?php echo $result['A']; ?></h3>
                            <p>Sensitive</p>
                          </div>
                        </div>
                     </div>
              <?php }  if($max==$result['B']) {?>
             
                     <div class="col-md-3">
                        <div class="panel panel-default card-view">
                          <div class="panel-body">
                            <h3><?php echo $result['B']; ?></h3>
                            <p>Achiever</p>
                          </div>
                        </div>
                     </div>
           <?php } if($max==$result['C']) {?>
                     <div class="col-md-3">
                        <div class="panel panel-default card-view">
                          <div class="panel-body">
                            <h3><?php echo $result['C']; ?></h3>
                            <p>Logical</p>
                          </div>
                        </div>
                     </div>
              <?php }  if($max==$result['D']) {?>

                     <div class="col-md-3">
                        <div class="panel panel-default card-view">
                          <div class="panel-body">
                            <h3><?php echo $result['D']; ?></h3>
                            <p>Energy</p>
                          </div>
                        </div>
                     </div>
           <?php }?>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                      <?php if($max==$result['A']){?>
                        <p><strong>A - </strong> You display a high score in Sensitive Personality</p>
                        <p>&nbsp;</p>
                      <?php }  if($max==$result['B']) {?>
                        <p><strong>B - </strong> You display a high score in Achiever Personality</p>
                        <p>&nbsp;</p>
                      <?php }?>
                      </div>
                      <div class="col-md-6">

                      <?php if($max==$result['C']) {?>
                        <p><strong>C - </strong> You display a high score in Logical Personality</p>
                        <p>&nbsp;</p>
                        <?php }  if($max==$result['D']) {?>
                        <p><strong>D - </strong> You display a high score in Energy Personality</p>
                        <p>&nbsp;</p>
                        <?php }?>
                      </div>
                    </div>

               </div>

            </div>

         </div>

      </div>

   </div>

   <!-- /Row -->

</div>

