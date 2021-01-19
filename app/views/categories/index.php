
<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Categories</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Categories</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

       
          <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus"></i> Add Category</button>
          <br /> <br />
       

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Categories</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Category Name</th>
                <th>Status</th>
                
                  <th>Action</th>
             
              </tr>
              </thead>
              <tbody>
                <?php foreach($data['categories'] as $category) { ?>
                    <tr>
                       
                        <td><?php echo $category['name']; ?> </td>
                        <?php if($category['active']==1) { ?>
                        <td><span class="label label-success">Active</span></td>
                    <?php } elseif($category['active'] == 2) { ?>
                        <td><span class="label label-warning">Inactive</span></td>
                    <?php } ?>

                

                        
                        <td><button type="button" class="btn btn-default edit" value="<?php echo $category['id']; ?>" data-toggle="modal" data-target="#editCategoryModal<?php echo $category['id']; ?>"><i class="fa fa-pencil"></i></button> |
                            
                         <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#removeCategoryModal<?php echo $category['id']; ?>"><i class="fa fa-trash"></i></button></td>
                      
                        
                    </tr>
                  
                  <!-- edit category modal -->
                  <div class="modal fade" tabindex="-1" role="dialog" id="editCategoryModal<?php echo $category['id']; ?>">
                  
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Category</h4>
                        </div>

                        <form role="form" method="post" id="updateBrandForm">

                          <div class="modal-body">
                            <div id="messages"></div>

                            <div class="form-group">
                              <label for="edit_brand_name">Category Name</label>
                              <input type="text" class="form-control" value="<?php echo $category['name']; ?>" id="edit_category_name<?php echo $category['id']; ?>" name="name" placeholder="Enter category name" autocomplete="off">
                            </div>
                            <div class="form-group">
                              <label for="edit_active">Status</label>
                              <select class="form-control" value="<?php echo $category['active']; ?>" id="edit_active<?php echo $category['id']; ?>" name="active">
                              <option value="1" <?php if($category['active'] == 1) {
                                                            echo " selected";
                                                            } ?>>Active</option>
                                <option value="2" <?php if($category['active'] == 2) {
                                                            echo " selected";
                                                            } ?>>Inactive</option>
                              </select>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary update" value="<?php echo $category['id']; ?>" id="update_category">Save changes</button>
                          </div>

                        </form>


                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->



                  <!-- remove brand modal -->
                  <div class="modal fade" tabindex="-1" role="dialog" id="removeCategoryModal<?php echo $category['id']; ?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Remove Brand</h4>
                        </div>

                        <form role="form" action="#" method="post" id="removeBrandForm">
                          <div class="modal-body">
                            <p>Do you really want to remove?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="<?php echo $category['id']; ?>" id="delete_category">Save changes</button>
                          </div>
                        </form>


                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                <?php } ?>
            
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


<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addCategoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Brand</h4>
      </div>

      <form role="form" action="<?php echo URLROOT;?>/categories/store" method="post" id="createBrandForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script type="text/javascript">

  $(document).on('click','#update_category', function(){
      $id = $(this).val();
      $name = $('#edit_category_name' + $id).val();
      $active = $('#edit_active' + $id).val();
     
     var form_url = '<?php echo URLROOT;?>/categories/update/' + $id;
        // alert(form_url);
      $.ajax({
        
        url:form_url ,  
        type: 'POST',
        data: {
           id : $id,
          name: $name,
          active: $active,
        
        },
        success: function(){
          window.location.reload();
        }
      });
      
    });

       
//delete category
  $(document).on('click','#delete_category', function(){
      $id = $(this).val();
      // alert($id);
   
      var del_url = '<?php echo URLROOT;?>/categories/removeCategory/' + $id;
          // alert(del_url);
        //  alert($id);
        //  alert($name);
        //  alert($active);
        $.ajax({
            url: del_url,
            type: 'DELETE',
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {                
                window.location.reload();
            }
        });
      
    });

</script>


<?php require_once APPROOT .'/views/inc/footer.php'; ?>
