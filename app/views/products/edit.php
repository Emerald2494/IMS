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

        <!-- <div id="messages"></div> -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" method="POST" action="<?php echo URLROOT;?>/products/update">
          <input type="hidden" name="product_id" value="<?php echo $data['products']['product_id']; ?>">
          <div class="box-body">

                <div class="form-group">
                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file">
                          <input id="product_image" value="<?php echo $data['products']['img'];?>" name="product_image" type="file">
                      </div>
                  </div>
                </div>
                
               <div class="form-group">
                  <label for="product_name">Product name</label>

                  <input type="text" class="form-control" value="<?php echo $data['products']['name']; ?>" name="product_name" placeholder="Enter product name"/>
                  

                </div>
             
                
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" value="<?php echo $data['products']['price'];?>" id="price" name="price" placeholder="Enter price" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="qty">Qty</label>
                  <input type="number" class="form-control" value="<?php echo $data['products']['qty'];?>" id="qty" name="qty" placeholder="Enter Qty" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="discount">Discount</label>
                  <input type="number" class="form-control" id="discount" value="<?php echo $data['products']['discount'];?>" name="discount" placeholder="Enter Discount" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="date_received">Date Received</label>
                  <input type="date" class="form-control" id="date_received" value="<?php echo $data['products']['date_received'];?>" name="date_received" placeholder="Enter Qty" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="brand">Brand</label>
                  <select class="form-control" id="brand" name="brand">
                          <?php foreach ($data['brands'] as $brand) { ?>
                            <option value="<?php echo $brand['id']; ?>" <?php if ($brand['id'] == $data['products']['brand_id']) {
                                echo " selected";
                            } ?>>

                            <?php echo $brand['name']; ?>
                            </option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="model">Model</label>
                  <select class="form-control" id="model" name="model">
                          <?php foreach ($data['models'] as $model) { ?>
                            <option value="<?php echo $model['id']; ?>" <?php if ($model['id'] == $data['products']['model_id']) {
                                echo " selected";
                            } ?>>

                            <?php echo $model['name']; ?>
                            </option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" id="category" name="category">
                          <?php foreach ($data['categories'] as $category) { ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $data['products']['category_id']) {
                                echo " selected";
                            } ?>>

                            <?php echo $category['name']; ?>
                            </option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Store</label>
                  <select class="form-control" id="store" name="store">
                            <?php foreach ($data['stores'] as $store) { ?>
                            <option value="<?php echo $store['id']; ?>" <?php if ($store['id'] == $data['products']['store_id']) {
                                echo " selected";
                            } ?>>

                            <?php echo $store['name']; ?>
                            </option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off"> <?php echo $data['products']['description'];?>
                  </textarea>
                </div>
                
                <div class="form-group">
                  <label for="availability">Availability</label>
                  <select class="form-control" id="availability<?php echo $data['products']['availability'];?>" name="availability">
                                
                    <option value="1" <?php if($data['products']['availability'] == 1) {
                        echo " selected";
                        } ?>>Yes</option>
                    <option value="2" <?php if($data['products']['availability'] == 2) {
                        echo " selected";
                        } ?>>No</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="date_sold">Date Sold</label>
                  <input type="date" class="form-control" id="date_sold" value="<?php echo $data['products']['date_sold'];?>" name="date_sold" placeholder="Enter Qty" autocomplete="off" />
                </div>

               
                
          </div>  
          <div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <a href="<?php echo URLROOT;?>/products/index" class="btn btn-warning">Back</a>
          </div>      
          </form>
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