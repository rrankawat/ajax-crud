<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1 class="text-center text-secondary">Welcome To The Page</h1><br/><br/>

<div class="row">
	<div class="col-md-11">
		<h2 class="text-secondary">Users List</h2>
	</div>
	<div class="col-md-1">
		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create" style="margin-top: 5px;">Create</button>
	</div>
</div><br/>

<!-- Create User Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  		  <div class="form-group">
  		    <label>First Name</label>
  		    <input type="text" class="form-control" id="first_name" placeholder="First Name">
  		  </div>
  		  <div class="form-group">
  		    <label>Last Name</label>
  		    <input type="text" class="form-control" id="last_name"  placeholder="Last Name">
  		  </div>
  		  <div class="form-group">
  		    <label>City</label>
  		    <input type="text" class="form-control" id="city" placeholder="City">
  		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="button" id="create-data" class="btn btn-outline-success">Save</button>
      </div>
    </div>
  </div>
</div><!-- Create User Modal Ends -->

<!-- Update User Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View/Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" name="city" class="form-control" id="city" placeholder="City">
        </div>
        <input type="hidden" name="user_id_toupdate" id="user_id_toupdate">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="button" id="update-data" class="btn btn-outline-success">Save</button>
      </div>
    </div>
  </div>
</div><!-- Update User Modal Ends -->

<!-- Delete user model -->
<div class="modal" id="delete" tabindex="-1" role="dialog" style="margin-top: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-right"> 
        <h5 class="modal-title text-center">Are you sure want to delete ?</h5>
        <input type="hidden" name="user_id_todelete" id="user_id_todelete">
        <br/>
        <button type="button" id="delete-data" class="btn btn-outline-danger">Yes</button>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div><!-- Delete user model ends -->

<!-- Display all data -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="10%">Sr No</th>
      <th scope="col" width="25%">First</th>
      <th scope="col" width="25%">Last</th>
      <th scope="col" width="25%">City</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody id="show_data">
  </tbody>
</table>
<br><br>
