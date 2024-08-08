<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pension Portal | Karnataka Vikas Grameena Bank">
    <meta name="author" content="Brand Metrics Fintech Pvt Ltd : www.brandmetrics.in">
    <title>Pension Portal</title>
    <link rel="canonical" href="<?php echo base_url(); ?>">
	<link href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
 
    <img class="mb-4" src="<?php echo base_url('assets/brand/logo.png'); ?>" alt="Pension Portal | Karnataka Vikas Grameena Bank">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
	<?php echo form_open('','id="pension" autocomplete="off"'); ?>
	<?php echo $this->session->flashdata('fail');?>
	<?php echo form_error('epf'); ?>
	<?php echo form_error('pancard'); ?>
	<?php echo form_error('dob'); ?>
    <div class="form-floating">
      <input autocomplete="off" type="text" class="form-control" required name='epf' id="floatingInput">
      <label for="floatingInput">Pensioners EPF number</label>
    </div>
    <div class="form-floating">
      <input autocomplete="off" type="text" class="form-control" name='pancard' required onkeydown="upperCaseF(this)" id="floatingPassword" placeholder="PANCARD number">
      <label for="floatingPassword">PANCARD</label>
    </div>
	<div class="form-floating">
      <input autocomplete="off" type="date" class="form-control" name='dob' required id="floatingPassword" placeholder="dob">
      <label for="floatingPassword">Date of Birth</label>
    </div>
	<div class="form-floating">
     
    </div>
	<div class="checkbox mb-3">
      <label>
      <script>
          function upperCaseF(a){
            setTimeout(function(){
                a.value = a.value.toUpperCase();
            }, 1);
        }
       function onSubmit(token) {
            document.getElementById("pension").submit();
       }
      </script>
      </label>
    </div>
	<div class="form-floating">
	     <input type='submit' value='Login' data-action='submit' class="g-recaptcha w-100 btn btn-lg btn-primary" type="submit">
    </div>
	</form>
  </form>
</main>


    
  </body>
</html>
