<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('includes/admin-sidebar'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">

            <h1 class="h1">Pensioners Data</h1>

            <div class='row'>
                <div class='col-12 pt-3 pb-3 col-md-12 col-sm-12 col-lg-12'>
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
                
                <div class='col-12 pt-3 pb-3 col-md-12 col-sm-12 col-lg-12'>
                    <table class='table table-responsive table-bordered table-striped'>
                        <tr>
                            <th>EPF</th>
                            <th>NAME</th>
                            <th>DOB</th>
                            <th>PAN CARD</th>
                            <th>ACTION</th>
                        </tr>
                        <?php 
                        $data = $this->db->get('pensioners')->result_array();
                        foreach($data as $item){
                        echo "
                            <tr>
                                <td>".$item['EPF']."</td>
                                <td>".$item['PANCARDNO']."</td>
                                <td>".$item['NAME']."</td>
                                <td>".$item['DOB']."</td>
                                <td><a href='".base_url('delete-pensioner/'.$item['EPF'])."' class='btn btn-sm btn-danger'>Delete</a> <a href=''class='btn btn-sm btn-info'>Edit</a> </td>
                            </tr>
                        "    ;
                        }
                        ?>
                    </table>
		        </div>
                
            </div>
     </main>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>