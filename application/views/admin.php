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
	<?php echo form_open(); ?>
	<?php echo $this->session->flashdata('fail');?>
	<div class="form-floating">
      <input type="text" class="form-control" name='user' id="floatingInput">
      <label for="floatingInput">USERNAME</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name='password'  id="floatingPassword" >
      <label for="floatingPassword">PASSWORD</label>
    </div>

	<div class="checkbox mb-3">
      <label>
      </label>
    </div>
	<div class="form-floating">
      <input type='submit' value='Login' class="w-100 btn btn-lg btn-primary" type="submit">
    </div>
	</form>
	<br><BR><BR><br><BR><BR><br><BR><BR><br><BR><BR>
    
    <a href='https://www.brandmetrics.in/' rel="follow" title='Brand Metrics Fintech' class="mt-5 mb-3 text-muted">Designed by Brand Metrics Fintech Pvt Ltd</a>
  </form>
</main>


    
  </body>
</html>
