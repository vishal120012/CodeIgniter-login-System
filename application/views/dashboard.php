<!DOCTYPE html>
<html lang="en">
 <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    </head>
    <body>
    <div class="container">
      <div class="row">
         <div class="col-md-6">
           <div class="row">
            <div class="col-md-12">
                <h3>Thank You  Login Successful <?=$this->session->userdata('mobile')?>  <?=$this->session->userdata('email')?></h3>
                <a href="<?= base_url();?>auth/logout">Logout</a>                                               
               </div>
             </div>
          </div>               
      </div>
  </div>        
    </body>
</html>