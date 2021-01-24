

<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Groups</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Group</h3>
            </div>
            <form role="form" action="#" method="post">
              <div class="box-body">

                

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  
                  
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup"></td>
                      </tr>
                      <tr>
                        <td>Brands</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createBrand"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateBrand"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewBrand" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteBrand" ></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCategory"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewCategory" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteCategory"></td>
                      </tr>
                      <tr>
                        <td>Stores</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createStore" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateStore" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewStore" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteStore" ></td>
                      </tr>
                      <tr>
                        <td>Attributes</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createAttribute"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateAttribute"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewAttribute"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteAttribute"></td>
                      </tr>
                      <tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createProduct" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateProduct" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProduct"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteProduct" ></td>
                      </tr>
                      <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createOrder" ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateOrder"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewOrder"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteOrder"></td>
                      </tr>
                      <tr>
                        <td>Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewReports"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCompany" ></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProfile" ></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSetting"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Changes</button>
                <a href="#" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#mainGroupNav").addClass('active');
    $("#manageGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>