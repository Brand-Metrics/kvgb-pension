<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<style>
    
    .card {
  flex-direction: row;
}
.card img {
  width: 30%;
} 
a:active, a:hover, a.visited , a{ color:#999;text-decoration:none;}
</style><div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Dashboard</h1>
      </div>

	  <div class='align-items-center pt-3 pb-2 mb-3'>
		<h3>Staff Profile</h3>
		<div class="card" style="width: 28rem;">
          <img src="<?php echo base_url('assets/brand/profile.jpg'); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $user[0]['NAME']; ?></h5>
            <p class="card-text"><strong>PAN CARD </strong><?php echo $user[0]['PANCARDNO']; ?>, <br /><strong>Date of Birth </strong><?php echo date("d F Y", strtotime($user[0]['DOB'])); ?></p>
          </div>
        </div>
 	  </div>
      
      <div class='align-items-center pt-3 pb-2 mb-3'>
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title mb-3"><a href="https://pension.kvgbank.com/pdf/CIR 214-45-2024-PHRDD-DATED 04.07.2024.pdf" target="NEW">GROUP HEALTH INSURANCE POLICY TO RETIRED STAFF MEMBERS AND FAMILY PENSIONERS. . Dated 04.07.2024</h5>

<h5 class="card-title"><a href="https://www.kvgbank.com/pdf/PANandAADHAAR-Linking.pdf" target="NEW">CLICK HERE TO VIEW INSTRUCTIONS REGARDING PANCARD – AADHAAR LINKING & INOPERATIVE PANCARD NUMBERS - LAST DATE 20/08/2023</h5>
            
            <h5 class="card-title">Important Documents</h5>
            <!--<p class="card-text"><strong><a href="https://www.kvgbank.com/pdf/PANandAADHAAR-Linking.pdf" target="NEW">INSTRUCTIONS REGARDING PANCARD – AADHAAR LINKING & INOPERATIVE PANCARD NUMBERS - LAST DATE 20/08/2023</strong></p>
            <hr>-->
            <p class="card-text"><strong>NOTIFICATION OF KARNATAKA VIKAS GRAMEENA BANK (EMPLOYEES) PENSION REGULATIONS, 2018 & KARNATAKA VIKAS GRAMEENA BANK (OFFICERS AND EMPLOYEES) SERVICE (AMENDMENT) REGULATIONS, 2018-OPERATIONAL GUIDELINES.</strong></p>
            <hr>
            
            <ol>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/Pension-Notification-1.pdf" target="NEW">1). Pension Notification</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/005.pdf" target="NEW">2). Operational Guidelines</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/PF-REFUND-RECEIPT.pdf" target="NEW">3). PF Refund Receipt</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/094-COMMUTATION.pdf">4). Commutation</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/Cir-No-183-41-PHRDD-2019-LIFE-CERTIFICATE-KVGB.pdf" target="NEW">5). Pension-2019 Life Certificate-KVGB</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/232-43-2020-PHRDD-Digital-Life-Certificate-2020.pdf" target="NEW">6). Pension-Digital Life Certificate</a></li>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/008-2021-Group-Health-Insurance-Policy-to-retirees.pdf" target="NEW">7). Pensioners Health Insurance Policy</a></li>
           </ol>
           
            <h5 class="card-title mt-5">Important Circulars</h5>
           <ol>
            	<li class='list-group-item'><a href="https://www.kvgbank.com/pdf/194-PHRDD-PENSION-ARREARS-AS-PER-11-BPS.pdf" target="NEW">1). Cir 194/2021 Pension & Commutation Arrears</a></li>
           <?php 
                $forms = scandir('./pdf/');
                $i=2; $array = array('.pdf','.doc','.xls','-','.','_','+');
                foreach($forms as $file) {
                  if(preg_match("/pdf/", $file)) { ?>
                    <li class='list-group-item'><a href="<?php echo base_url('pdf/'.$file); ?>" target='_blank'>
                      <?php echo $i++."). ".trim(str_replace($array,' ',$file))?></a>
                    </li>
                <?php }} ?>
            </ol>
          </div>
        </div>
      </div>
     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>