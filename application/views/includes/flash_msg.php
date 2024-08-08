<?php
$success = $this->session->userdata('success');
if($success != ""){
	?>
	<div class="alert alert-success"><?php echo $success ?></div>
	<?php 
	$this->session->unset_userdata ( 'success' );
} 
?>
<?php
$failure = $this->session->userdata('failure');
if($failure != ""){
	?>
	<div class="alert alert-success"><?php echo $failure ?></div>
	<?php 
	$this->session->unset_userdata ( 'failure' );
} 
?>