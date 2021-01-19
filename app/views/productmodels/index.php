
<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Models</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Models</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

       
          <button class="btn btn-primary" data-toggle="modal" data-target="#addmodelModal"><i class="fa fa-plus"></i> Add Model</button>
          <br /> <br />
       

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Models</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Model Name</th>
                <th>Status</th>
                
                  <th>Action</th>
             
              </tr>
              </thead>
              <tbody>
                <?php foreach($data['models'] as $model) { ?>
                    <tr>
                       
                        <td><?php echo $model['name']; ?> </td>
                        <?php if($model['active']==1) { ?>
                        <td><span class="label label-success">Active</span></td>
                    <?php } else { ?>
                        <td><span class="label label-warning">Inactive</span></td>
                    <?php } ?>

                

                        
                    <td><button type="button" class="btn btn-default edit" value="<?php echo $model['id']; ?>" data-toggle="modal" data-target="#editModelModal<?php echo $model['id']; ?>"><i class="fa fa-pencil"></i></button> | 
                    <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#removeModelModal<?php echo $model['id']; ?>"><i class="fa fa-trash"></i></button></td>
                        
                    </tr>

                    
                      <!-- edit model modal -->
                      <div class="modal fade" tabindex="-1" role="dialog" id="editModelModal<?php echo $model['id']; ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Model</h4>
                            </div>

                            <form role="form" action="#" method="post" id="updateModelForm">

                              <div class="modal-body">
                                <div id="messages"></div>

                                <div class="form-group">
                                  <label for="edit_model_name">Model Name</label>
                                  <input type="text" class="form-control" value="<?php echo $model['name']; ?>" id="edit_model_name<?php echo $model['id']; ?>" name="name" placeholder="Enter model name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="edit_active">Status</label>
                                  <select class="form-control" value="<?php echo $model['active']; ?>" id="edit_active<?php echo $model['id']; ?>" name="active">
                                    <option value="1" <?php if($model['active'] == 1) {
                                                            echo " selected";
                                                            } ?>>Active</option>
                                    <option value="2" <?php if($model['active'] == 2) {
                                                            echo " selected";
                                                            } ?>>Inactive</option>
                                  </select>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="<?php echo $model['id']; ?>" id="update_model" >Save changes</button>
                              </div>

                            </form>


                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->



                      <!-- remove model modal -->
                      <div class="modal fade" tabindex="-1" role="dialog" id="removeModelModal<?php echo $model['id']; ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Remove model</h4>
                            </div>

                            <form role="form" action="#" method="post" id="removemodelForm">
                              <div class="modal-body">
                                <p>Do you really want to remove?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="<?php echo $model['id']; ?>" id="delete_model">Save changes</button>
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


<!-- create model modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addmodelModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Model</h4>
      </div>

      <form role="form" action="<?php echo URLROOT;?>/ProductMdl/store" method="post" id="createmodelForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="model_name">Model Name</label>
            <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Enter model name" autocomplete="off">
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

<?php require_once APPROOT .'/views/inc/footer.php'; ?>

<script type="text/javascript">

//update model
  $(document).on('click','#update_model', function(){
      $id = $(this).val();
      //  alert($id);

      $name = $('#edit_model_name' + $id).val();
      $active = $('#edit_active' + $id).val();
   
     var form_url = '<?php echo URLROOT;?>/ProductMdl/update/' + $id;
      
      $.ajax({
        
        url:form_url,  
        type: 'POST',
        data: {
           id : $id,
          name: $name,
          active: $active,
        
        },
      
        // data : $('form').serialize(),
        success: function(){
          // alert('OK');
          window.location.reload();
        }
      });
      
    });

    
//delete model
  $(document).on('click','#delete_model', function(){
      $id = $(this).val();
      alert($id);
   
      var del_url = '<?php echo URLROOT;?>/productmdl/removeModel/' + $id;
          alert(del_url);
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

