<!DOCTYPE html>
<html>
<head>
<title>VIEW REPORT</title>
<meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">

             <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

             

 <style>
 
  .top{
background-color:#5c00e6;
}
.bi
{
  background-image: url("../img/9.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
/*body{
background-image: url("../img/im2a.png");
background-size: cover;
background-attachment: fixed;
}*/


</style>
</head>
	 //    ****
 // *
 // * @function:trainer_noti
 // * @function:view notification
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
 //      ****
  <body class="overhidden">
 <div class="container ">

      <label><h3>Warning Message</h3></label>
   <table class="table">
    <thead>
      <tr>
        
        <th>Notification</th>
        
      </tr>
    </thead>
      <?php 
      if($n->num_rows()>0)
      {
          foreach($n->result() as $row)
          {
  ?>

            <tr>
              <td><?php echo $row->notification;?></td>
              
            </tr>
        
      <?php
        }
    }
      ?>


    </tbody>
  </table>
  <a href="<?php echo base_url()?>main/trainerdashboard">back</a>
</div>
</section>
</body>
</html>
