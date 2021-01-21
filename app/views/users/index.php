

<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          
            <a href="#" class="btn btn-primary">Add User</a>
            <br /> <br />
        


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Group</th>

                  
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                 
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                       

                        <td>
                          
                            <a href="#" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          
                            <a href="#" class="btn btn-default"><i class="fa fa-trash"></i></a>
                       
                        </td>
                   
                      </tr>
                    
               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
      $('#userTable').DataTable();

      $("#mainUserNav").addClass('active');
      $("#manageUserNav").addClass('active');
    });
  </script>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>