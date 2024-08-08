<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-5 mb-5 align-items-center border-bottom">
        <h1 class="h1">Dashboard</h1>
      </div>
      <div class="pt-5 mb-5 align-items-left">
		<h3>Form 16 Download</h3>
		<?php 
		$epf = $this->session->userdata('EPF');
		$this->db->where('EPF',$epf);
		$user = $this->db->get('form16')->result_array();
		if($user){
		echo "<p><a target='_blank' href='".base_url('uploads/2024/parta/'.$user[0]['PAN_NO']."_2024-25.pdf'")."> ".$user[0]['PAN_NO']." Form 16 2024-25 PART A</a></p>";
		
		echo "<p><a target='_blank' href='".base_url('uploads/2024/partb/'.$user[0]['PAN_NO']."_PARTB_2024-25.pdf'")."> ".$user[0]['PAN_NO']." Form 16 2024-25 PART B</a></p>";    
		}
		 else {
		 echo "<p>No Form 16 Found"; }
		 ?>
		
		
 	  </div>
      

     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>