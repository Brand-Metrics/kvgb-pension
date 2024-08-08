<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <style>
       .hidden{
                display:none;
            }
	  @media print {
               .btn, .navbar , .sidebar ,.title {
                  visibility: hidden;
               }
                .hidden{
                  display:block;
                 }
               table{
                   font-size:11px;
               }
               .head{
                   padding-top:0px !important;
               }
            }
            
           
	  </style>
	  
      <div class="mb-5 align-items-left head">
		<div class="container">
		  <div class="row">
		  
			  <h1 class='title pt-5'>KARNATAKA VIKAS GRAMEENA BANK</h1>
			  <div class='hidden'><img src='https://www.kvgbank.com/images/logo.png' width='100%'></div>
			  <h2>11th BIPARTITE SETTLEMENT</h2>
			  <h3>PENSION & COMMUTATION ARREARS DETAILS</h3>
			  
			  <br /><br />
			  <button class='btn btn-primary' style='width:150px;' onclick="window.print()">Print this page</button>
  			  <br /><br />

				<table class="table table-bordered">
				  <thead>
					<tr>
					  <th scope="col">Emp No : </th>
					  <th scope="col"><?php echo $epf; ?></th>
					</tr>
				  	<tr>
					  <th scope="col">NAME : </th>
					  <th scope="col"><?php 
					  $this->db->where('EPF',$epf);
	                  $info  = $this->db->get('pensioners')->result_array();
	                  echo $info[0]['NAME'];  ?></th>
					</tr>
				  </thead>
				</table>  
				
				<h3 class='pt-5 mb-5 '>DETAILED MONTHWISE PENSION ARREARS</h3>
				<table class="table table-bordered">
				        <thead>
				            <tr>
				                <th>MONTH</th>
				                <th>OLD BASIC PENSION</th>
				                <th>DA RATE</th>
				                <th>DA</th>
				                <th>OLD GROSS</th>
				                <th>NEW BASIC PENSION</th>
				                <th>DA RATE</th>
				                <th>DA</th>
				                <th>NEW GROSS</th>
				                <th>DIFFERENCE AMT</th>
				            </tr>
				        </thead>
				  <tbody>
				<?php
				if(isset($arrears)){
				foreach($arrears as $arr){
				    echo "
				    <tr>
					  <td>".$arr['MONTH']."</td>
					  <td>".$arr['OLD_BASIC_PENSION']."</td>
					  <td>".$arr['DA_RATE']."</td>
					  <td>".$arr['DA']."</td>
					  <th>".$arr['OLD_GROSS']."</th>
					  <td>".$arr['NEW_BASIC_PENSION']."</td>
					  <td>".$arr['NEW_DA_RATE']."</td>
					  <td>".$arr['NEW_DA']."</td>
					  <th>".$arr['NEW_GROSS']."</th>
					  <th>".$arr['DIFF_AMT']."</th>
					</tr>
					";} }
				?>
				</tbody>
				  </table>
				  
				  
				  <h3 class='pt-5 mb-5 '>COMMUTATION DETAILS</h3>
				<table class="table table-bordered">
				        <thead>
				            <tr>
				                <th>Date Of COMM</th>
				                <th>AGE AS ON DOC</th>
				                <th>OLD BASIC PENSION</th>
				                <th>COMM VALUE</th>
				                <th>AGE FACT</th>
				                <th>COMM AMOUNT</th>
				                <th>NEW BASIC PENSION</th>
				                <th>COMM VALUE</th>
				                <th>AGE FACT</th>
				                <th>COMM AMOUNT</th>
				                <th>COMM DIFF</th>
				                <th>COMM VALUE DIFF</th>
				                <th>No. of Months</th>
				                <th>COMM VALUE DIFF RECOVERY</th>
				                <th>Net COMM AMOUNT</th>
				            </tr>
				        </thead>
				  <tbody>
				<?php
					if(isset($commutation)){
					    
				foreach($commutation as $cm){
				    $COMM_DIFFERENCE = $cm['COMM_DIFFERENCE'];
				    $COMM_VALUE_DIFF = $cm['COMM_VALUE_DIFF'];
				    $No_of_Months = $cm['No_of_Months'];
				    $COMM_VALUE_DIFF_RECOVERY = $cm['COMM_VALUE_DIFF_RECOVERY'];
				    $Net_COMM_AMOUNT = $cm['Net_COMM_AMOUNT'];
				    echo "
				    <tr>
					  <td>".$cm['DATE_OF_COMM']."</th>
					  <td>".$cm['AGE_AS_ONDOC']."</th>
					  <td>".$cm['OLD_BASIC_PENSION']."</th>
					  <td>".$cm['COMM_VALUE']."</th>
					  <td>".$cm['AGE_FACT']."</th>
					  <td>".$cm['COMMU_AMOUNT']."</th>
					  <td>".$cm['NEW_BASIC_PENSION']."</th>
					  <td>".$cm['NEW_COMM_VALUE']."</th>
					  <td>".$cm['NEWAGE_FACT']."</th>
					  <td>".$cm['NEW_COMMU_AMOUNT']."</th>
					  <td>".$cm['COMM_DIFFERENCE']."</th>
					  <td>".$cm['COMM_VALUE_DIFF']."</th>
					  <td>".$cm['No_of_Months']."</th>
					  <td>".$cm['COMM_VALUE_DIFF_RECOVERY']."</th>
					  <td>".$cm['Net_COMM_AMOUNT']."</th>
					</tr>
					";
				 } }
				 ?>
					    </tbody>
				  </table>
				  <?php
				  if(!empty($pension_arrears)) {
    				  ?>
				  <table class="table table-bordered">
				        <tr>
				            <th>PENSION ARREARS</th>
				            <th><?php echo  $pension_arrears[0]['DIFF']; ?></th>
				        </tr>
				        <tr>
				            <th>COMMUTATION DIFFERENCE</th>
				            <td><?php echo  $COMM_DIFFERENCE; ?></td>
				        </tr>
				        <tr>
				            <th>COMM VALUE DIFFERENCE</th>
				            <td><?php echo  $COMM_VALUE_DIFF; ?></td>
				        </tr>
				        <tr>
				            <th>NO OF MONTHS ( from date of Comm to Jul-2021)</th>
				            <td><?php echo  $No_of_Months; ?></td>
				        </tr>
				        <tr class="table-danger">
				            <th>COMM VALUE DIFFERENCE RECOVERY</th>
				            <td><?php echo $COMM_VALUE_DIFF_RECOVERY; ?></td>
				        </tr>
				        <tr>
				            <th>NET COMM AMOUNT</th>
				            <td><?php echo $Net_COMM_AMOUNT; ?></td>
				        </tr>
				    </table> 
				  <?php  } ?>
    		  </div>
		</div>	
		
 	  </div>
      

     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>