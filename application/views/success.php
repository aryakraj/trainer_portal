<h2>Email Success Page</h2><br>
  
  <?php if($error = $this->session->flashdata('msg')){ ?>
       <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
  <?php } ?>


</form>