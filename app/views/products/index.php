<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

       
          <a href="<?php echo URLROOT;?>/products/create" class="btn btn-primary"> Add Product</a>
          <br /> <br />
       

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Date Received</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Category</th>
                  <th>Store</th>
                  <th>Date Sold</th>
                
                  <th>Availability</th>
                    <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($data['products'] as $product) { ?>
                    <tr>
                        <td><?php echo $product['name']; ?> </td>
                        
                        <td><?php echo $product['description']; ?> </td>
                        <td><?php echo $product['date_received']; ?> </td>
                        
                        <td><?php echo $product['price']; ?> </td>
                        <td><?php echo $product['qty']; ?> </td>
                        
                        <td><?php echo $product['brand_name']; ?> </td>
                        <td><?php echo $product['model_name']; ?> </td>
                        <td><?php echo $product['category_name']; ?> </td>
                        <td><?php echo $product['store_name']; ?> </td>
                        <td><?php echo $product['date_sold']; ?> </td>
                       
                        <?php if($product['availability']==1) { ?>
                        <td><span class="label label-success">Yes</span></td>
                    <?php } else { ?>
                        <td><span class="label label-warning">No</span></td>
                    <?php } ?>       

                        
                        <td><a href="<?php echo URLROOT;?>/products/edit/<?php echo $product['product_id']; ?>" type="button" class="btn btn-default edit"><i class="fa fa-pencil"></i></a> |
                            
                        <a href="<?php echo URLROOT; ?>/products/removeProducts/<?php echo $product['product_id']; ?>" type="button" class="btn btn-default" ><i class="fa fa-trash"></i></a></td>
                      
                        
                    </tr>
                  
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





<?php require_once APPROOT .'/views/inc/footer.php'; ?>