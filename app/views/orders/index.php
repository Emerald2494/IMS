<?php require_once APPROOT .'/views/inc/header.php'; ?>
<?php require_once APPROOT .'/views/inc/header_menu.php'; ?>
<?php require_once APPROOT .'/views/inc/side_menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Orders</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Orders</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

          <a href="<?php echo URLROOT; ?>/orders/create" class="btn btn-primary">Add Order</a>
          <br /> <br />

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Orders</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Customer Name</th>
                <th> Address</th>
                <th> Contact_Number</th>
                <th>OR Number</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Gross Amount</th>
                <th>Vat Charge</th>
                <th>Net Amount</th>
                
                  <th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($data['orders'] as $order) { ?>
                    <tr>
                        <td><?php echo $order['user_name']; ?> </td>
                        <td><?php echo $order['user_address']; ?> </td>
                        <td><?php echo $order['user_contact_number'];?></td>
                        <td><?php echo $order['or_number']; ?> </td>
                        <td><?php echo $order['invoice_number']; ?> </td>
                        <td><?php echo $order['date_order']; ?> </td>
                        <td><?php echo $order['gross_amount']; ?> </td>
                        <td><?php echo $order['vat_charge'];?></td>
                        <td><?php echo $order['net_amount']; ?> </td>
                     
                       
                        <td><a href="<?php echo URLROOT;?>/orders/viewOrderLines/<?php echo $order['id']; ?>" type="button" class="btn btn-default" > <i class="fa fa-eye" aria-hidden="true"></i></a></td>
                      
                        
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