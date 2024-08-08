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
			  <h3>COMPUTER ARREARS DETAILS</h3>
			  
			  

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
				
				<h3 class='pt-5 mb-5 '>COMPUTER PENSION ARREARS</h3>
				<table class="table table-bordered text-center">
				        <thead>
				            <tr>
				                <th class='bg-warning'>OLD PENSION BP</th>
				                <th>TOTAL OLD  BP</th>
				                <th>TOTAL OLD DA</th>
				                <th>OLD GROSS PENSION </th>
				                <th class='bg-warning'>New PENSION BP</th>
				                <th>TOTAL NEW BP</th>
				                <th>TOTAL NEW DA</th>
				                <th>NEW GROSS PENSION</th>
				                <th class='bg-warning' >Arrears</th>
				                <th>Narration</th>
				            </tr>
				        </thead>
				  <tbody>
				<?php
				if(isset($computer_arrers)){
				foreach($computer_arrers as $arr){
				    echo "
				    <tr>
					  <td class='bg-warning'>".$arr['A']."</td>
					  <td>".$arr['B']."</td>
					  <td>".$arr['C']."</td>
					  <td>".$arr['D']."</td>
					  <th class='bg-warning'>".$arr['E']."</th>
					  <td>".$arr['F']."</td>
					  <td>".$arr['G']."</td>
					  <td>".$arr['H']."</td>
					  <th class='bg-warning'>".$arr['Arrears']."</th>
					  <th>".$arr['Narration']."</th>
					</tr>
					";} }
				?>
				</tbody>
				</table>
				<?php 
				$user = $epf;
				$filePath = 'uploads/computer/' . $user . '.pdf';
				if (file_exists($filePath)) {
					echo "<h2 class='bg-info p-5  '><a class='text-white' href='" . base_url($filePath) . "'>Download Computer Arrears</a></h2>";
				}
				else{
					echo "No File Found";
				}
				?>


			<h3 class='pt-5 mt-5 '>Commutation arrears of computer Increment From Retirement to till January-2024</h3>
				<table class="table table-bordered text-center">
				        <thead>
				            <tr>
				                <th>DOR</th>
				                <th>OLD COMMUTATION FACTOR</th>
				                <th>Increased Basic by FPP</th>
				                <th>Commutation Factor of FPP</th>
				                <th>TILL DATE</th>
				                <th>DIFF NO OF MONTHS</th>
				                <th>Commutation Value for Diff FPP</th>
				                <th>Recovery Of Comt Factor</th>
				                <th>Net Commuattion Payable</th>
				                <th>New Commutation Factor</th>
				                <th>Narration</th>
				            </tr>
				        </thead>
				  <tbody>
				<?php
				$result = $this->db->where('EPF',$epf)->get('itd_upload')->result_array();
				if(isset($result)){
				foreach($result as $item){
				    echo "
				    <tr>
						<td>".$item['DOR']."</td>
						<td>".$item['OLD COMMUTATION FACTOR']."</td>
						<td>".$item['Increased Basic by FPP']."</td>
						<td>".$item['Commutation factor of FPP']."</td>
						<td>".$item['TILL DATE']."</td>
						<td>".$item['DIFF NO OF MONTHS']."</td>
						<td>".$item['Commutation Value for Diff FPP']."</td>
						<td>".$item['RECOVERY OF COMT FACTOR']."</td>
						<td>".$item['NET COMMUTATION PAYABLE']."</td>
						<td>".$item['NEW COMMUTAION FACTOR']."</td>
						<td>".$item['Narration']."</td>
					</tr>
					";} }
				?>
				</tbody>
				</table>
			  </div>
		</div>	
		
 	  </div>
      

     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>