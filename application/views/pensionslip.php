<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-5 mb-5 align-items-center border-bottom">
        <h1 class="h1">Pension Slip</h1>
      </div>
      <div class="pt-5 mb-5 align-items-left">
		<div class="container">
		  <div class="row">
		    <?php 
		    $i=1;
		    $temp="";
    		foreach($info as $month) {
    		    if($temp != substr($month['Month'],0,4) ) {
    		        echo "</div><div class='row mt-2'>
    		        <h3>".substr($month['Month'],0,4)."</h3>
    		        ";
    		    }
    		    $month_name = date("F", mktime(0, 0, 0, substr($month['Month'],4,2), 10));
    			echo "<div class='col-3 p-2'><a href=".base_url('pension-data/'.$month['Month'])." class='btn btn-primary ' target='_blank'> $month_name ".substr($month['Month'],0,4)."</a></div>";
  		        $temp = substr($month['Month'],0,4);
    		}
	    	?>
	   	  </div>
		</div>	
		
 	  </div>
      

     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>