<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/admin-sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">

            <h1 class="h1">Dashboard</h1>
            <?php $this->load->view('includes/flash_msg') ?>
            <div class='row'>
                <!-- <div class='col-6 pt-6 pb-3 col-md-6 col-sm-12 col-lg-6'>
                    <?php echo form_open('pension-slip'); ?>
            		 <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">check the format before uploading </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
            		</form>
		        </div> -->
            <div class='col-6 pt-6 pb-3 col-md-6 col-sm-12 col-lg-6'>
               <?php echo form_open(base_url('pension-slip/import'),'enctype="multipart/form-data"'); ?>
               <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Month - Year</label>
                        <input type="month" class="form-control" name="datepicker" id="datepicker" />
                        
                  </div>
                  <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Upload File</label>
                        <input type="file" name="file" accept=".xls,.xlsx" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">check the format before uploading </div>
                  </div>
                  <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                      
            		</form>

                <?php
          ?>
		          </div> 

      
              
                <div class='col-6 pt-6 pb-3 col-md-6 col-sm-12 col-lg-6'>
                    <?php echo form_open('add-pensioner'); ?>
                    <div class="card">
                        <div class="card-header">
                         Quick Add
                        </div>
                      <div class="card-body">
                        <h5 class="card-title">Add Pensioner</h5>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">EPF</label>
                            <input type="text" name='epf' class="form-control" required  id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                		  <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">PAN CARD</label>
                            <input type="text" name='pancard' class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                		  <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NAME</label>
                            <input type="text" class="form-control" name='name' required id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                		  <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name='dob' required id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          
                        <button type="submit" name='pensioner' class="btn btn-primary">Add Pensioner</button>
                      </div>
                    </div>
                    


                      
            		</form>
                </div>
            </div>
     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>