<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <style>
	  @media print {
               .btn, .navbar , .sidebar, footer{
                  visibility: hidden;
               }
            }
	  </style>
	  
      <div class="pt-5 mb-5 align-items-left">
		<div class="container">
		  <div class="row">
				<div class="col-sm-11">
			  <h1>KARNATAKA VIKAS GRAMEENA BANK</h1>
			  <h2>HEAD OFFICE : DHARWAD</h2>
			  <h3>PENSION SLIP : <?php 
			  $month_name = date("F", mktime(0, 0, 0, substr($info[0]['Month'],4,2), 10)); 
			  echo $month_name." ".substr($info[0]['Month'],0,4); ?> </h3>
			
			  </div>
			  <div class="col-sm-1 text-sm-right">
		 <a href='<?php echo base_url('pension-slip/download/'.$info[0]['Month'])?>' target='_blank' ><img src='<?php echo base_url('assets/brand/print.png');?>' style="width:30px;"></i></a>
		  </div>
			  
			 
				<table class="table table-bordered">
				  <thead>
					<tr>
					  <th scope="col">Emp No : </th>
					  <th scope="col"><?php echo $info[0]['EPF']; ?></th>
					</tr>
				  	<tr>
					  <th scope="col">Pension P. No : </th>
					  <th scope="col"><?php echo $info[0]['PPO']; ?></th>
					</tr>
				  	<tr>
					  <th scope="col">Name : </th>
					  <th scope="col"><?php echo $info[0]['STAFF_NAME']; ?></th>
					</tr>
				  	<tr>
					  <th scope="col">Branch : </th>
					  <th scope="col"><?php echo $info[0]['BRANCH']; ?></th>
					</tr>
				  	<tr>
					  <th scope="col">Beneficiary Name( if any) : </th>
					  <th scope="col"><?php echo $info[0]['BENIFICIARY_NAME']; ?></th>
					</tr>
				  </thead>
				</table>  
				
				<h3 class='pt-5 mb-5 '>Pension Slip</h3>
				<table class="table table-bordered">
				  <thead>
					<tr class="table-light">
					  <th scope="col" width='45%' colspan='2'>EARNINGS </th>
					  <th scope="col" width='45%' colspan='2'>DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</th>
					  <td><?php echo $info[0]['BASIC_PENSION']; ?></th>
					  <td>EPF</th>
					  <td><?php echo $info[0]['EPFO']; ?></th>
					</tr>
				 	<tr>
					  <td>DA Rate</th>
					  <td><?php echo $info[0]['DA_Rate']; ?></th>
					  <td>COMMUTATION FACT</th>
					  <td><?php echo $info[0]['COMMUTATION_FACT']; ?></th>
					</tr>
					<tr>
					  <td>DA</th>
					  <td><?php echo $info[0]['DA']; ?></th>
					  <td>TDS</th>
					  <td><?php echo $info[0]['TDS']; ?></th>
					</tr>
					<tr>
					  <td>Ex-gartia</th>
					  <td><?php echo $info[0]['exgratia']; ?></th>
					  <td></th>
					  <td></th>
					</tr>
				 	<tr>
					  <th scope="row">GROSS</th>
					  <th scope="row"><?php echo $info[0]['TOTAL_PENSION']; ?></th>
					  <th scope="row">TOTAL DEDUCTION</th>
					  <th scope="row"><?php echo $info[0]['TDS']+$info[0]['COMMUTATION_FACT']+$info[0]['EPFO']; ?></th>
					</tr>
					<tfoot>
					<tr>
					  <th scope="row">NET PENSION</th>
					  <th scope="row" colspan='3'><?php echo $info[0]['NET_PENSION_PAYABLE']; ?></th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>
				  
				  
				  
				  <?php
				  if(isset($add)) {
				      
				      echo "<h3 class='pt-5 mb-5 '>Addtional Slip</h3>";
				  foreach($add as $item) {
				    ?>
				 
				<table class="table table-bordered">
				  <thead>
					<tr class="table-light">
					  <th scope="col" width='45%' colspan='2'>EARNINGS </th>
					  <th scope="col" width='45%' colspan='2'>DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</th>
					  <td><?php echo $item['BASIC_PENSION']; ?></th>
					  <td>EPF</th>
					  <td><?php echo $item['EPFO']; ?></th>
					</tr>
				 	<tr>
					  <td>DA Rate</th>
					  <td><?php echo $item['DA_Rate']; ?></th>
					  <td>COMMUTATION FACT</th>
					  <td><?php echo $item['COMMUTATION_FACT']; ?></th>
					</tr>
				 	<tr>
					  <td>DA</th>
					  <td><?php echo $item['DA']; ?></th>
					  <td>TDS</th>
					  <td><?php echo $item['TDS']; ?></th>
					</tr>
				 	<tr>
					  <th scope="row">GROSS</th>
					  <th scope="row"><?php echo $item['TOTAL_PENSION']; ?></th>
					  <th scope="row">TOTAL DEDUCTION</th>
					  <th scope="row"><?php echo $item['TDS']+$item['COMMUTATION_FACT']+$item['EPFO']; ?></th>
					</tr>
					<tfoot>
					<tr>
					  <th scope="row">NET PENSION</th>
					  <th scope="row" colspan='3'><?php echo $item['NET_PENSION_PAYABLE']; ?></th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>
				  <p>* <?php echo $item['BENIFICIARY_NAME']; ?></p>
				  <?php } 
				  } ?>
				  
				  
				  
				  
				  <?php
				  if(isset($rec)) {
				  
				  echo "<h3 class='pt-5 mb-5 '>Recovery</h3>";
				  foreach($rec as $item) {
				    ?>
				 
				<table class="table table-bordered">
				  <thead>
					<tr class="table-light">
					  <th scope="col" width='45%' colspan='2'>EARNINGS </th>
					  <th scope="col" width='45%' colspan='2'>DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</th>
					  <td><?php echo $item['BASIC_PENSION']; ?></th>
					  <td>EPF</th>
					  <td><?php echo $item['EPFO']; ?></th>
					</tr>
				 	<tr>
					  <td>DA Rate</th>
					  <td><?php echo $item['DA_Rate']; ?></th>
					  <td>COMMUTATION FACT</th>
					  <td><?php echo $item['COMMUTATION_FACT']; ?></th>
					</tr>
				 	<tr>
					  <td>DA</th>
					  <td><?php echo $item['DA']; ?></th>
					  <td>TDS</th>
					  <td><?php echo $item['TDS']; ?></th>
					</tr>
				 	<tr>
					  <th scope="row">GROSS</th>
					  <th scope="row"><?php echo $item['TOTAL_PENSION']; ?></th>
					  <th scope="row">TOTAL DEDUCTION</th>
					  <th scope="row"><?php echo $item['TDS']+$item['COMMUTATION_FACT']+$item['EPFO']; ?></th>
					</tr>
					<tfoot>
					<tr>
					  <th scope="row">NET PENSION</th>
					  <th scope="row" colspan='3'><?php echo $item['NET_PENSION_PAYABLE']; ?></th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>
				  <p>* <?php echo $item['BENIFICIARY_NAME']; ?></p>
				  <?php } 
				  } ?>
		 
		
		
		
		
		
		</div>
		</div>	
		
 	  </div>
      

     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>