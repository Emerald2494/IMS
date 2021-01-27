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

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Order</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php echo URLROOT;?>/orders/store" method="post" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="gross_amount" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                </div>
                <div class="form-group">
                  <label for="gross_amount" class="col-sm-12 control-label">Date: <?php echo date('h:i a') ?></label>
                </div>

                <div class="col-md-4 col-xs-12 pull pull-left">

                  <div class="form-group">
                    <label for="customer_name" class="col-sm-5 control-label" style="text-align:left;">Name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Your Name" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="address" class="col-sm-5 control-label" style="text-align:left;">Address</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="contact_no" class="col-sm-5 control-label" style="text-align:left;">Contact No.</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Number" autocomplete="off">
                    </div>
                  </div>

                </div>
                
                <br /> <br/>
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">Product</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:10%">Discount%</th>
                      <th style="width:20%">Amount</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default add_row"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                     <tr id="row_1">
                       <td>
                        <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product" style="width:100%;" onchange="getProductData(1)" required>
                          <option value=""></option>
                          <?php foreach ($data['products'] as $product) { ?>
                          <?php if($product['availability']==1) { ?>
                              <option value="<?php echo $product['product_id']; ?>">
                                  <?php echo $product['name']; ?>
                              </option>
                              <?php } ?>
                            <?php } ?>
                        </select>
                        </td>
                        <td><input type="text" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>
                        <td>
                          <input type="text" name="rate[]" id="rate_1" class="form-control" disabled autocomplete="off">
                          <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td>
                          <input type="text" name="discount[]" id="discount_1" class="form-control" disabled autocomplete="off">
                          <input type="hidden" name="discount_value[]" id="discount_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td>
                          <input type="text" name="amount[]" id="amount_1" class="form-control" disabled autocomplete="off">
                          <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-close"></i></button></td>
                     </tr>
                   </tbody>
                </table>

                <br /> <br/>

                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Gross Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="gross_amount" name="gross_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="vat" class="col-sm-5 control-label">VAT 5%</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="vat_charge" name="vat_charge" placeholder="VAT" onkeyup="subAmount()" autocomplete="off">
                      <input type="hidden" class="form-control" id="vat_charge_value" name="vat_charge_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="net_amount" class="col-sm-5 control-label">Net Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" autocomplete="off">
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="service_charge_rate" value="" autocomplete="off">
                <input type="hidden" name="vat_charge_rate" value="5" autocomplete="off">
                <button type="submit" class="btn btn-primary">Create Order</button>
                <a href="" class="btn btn-warning">Back</a>
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

<script type="text/javascript">
var base_url = "<?php echo URLROOT; ?>";
$('#add_row').unbind('click').bind('click', function() {
  
  $(".select_group").select2();
    // $("#description").wysihtml5();

    $("#mainOrdersNav").addClass('active');
    $("#addOrderNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 

    // Add new row in the table 
    
        var table = $("#product_info_table");
        var count_table_tbody_tr = $("#product_info_table tbody tr").length;
        var row_id = count_table_tbody_tr + 1;
        
        // alert(base_url);
        $.ajax({
            url: base_url + '/orders/getTableProductRow/',
            type: 'post',
            dataType: 'json',
            success:function(response) {
            
                //  console.log(response);
                var html = '<tr id="row_'+row_id+'">'+
                    '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                            html += '<option value="'+value.product_id+'">'+value.name+'</option>';             
                        });
                        
                        // html += '<option value="'+response.id+'">'+response.name+'</option>'; 
                        html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" disabled><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                    '<td><input type="text" name="discount[]" id="discount_'+row_id+'" class="form-control" disabled><input type="hidden" name="discount_value[]" id="discount_value_'+row_id+'" class="form-control"></td>'+
                    '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);  
                }
                else {
                $("#product_info_table tbody").html(html);
                }

                $(".product").select2();

            }
        });

        return false;
    });


    function getTotal(row = null) {
        if(row) {
        var rate = $('#rate_value_'+row).val();
        var discount = $('#discount_value_'+row).val();
        var discount_price =Number(rate) * Number(discount)/100 * Number($("#qty_"+row).val());
        // alert(discount_price);
        var total = Number($("#rate_value_"+row).val()) * Number($("#qty_"+row).val()) - Number(discount_price);
        total = total.toFixed(2);
        $("#amount_"+row).val(total);
        $("#amount_value_"+row).val(total);
        var rate = $('#rate_value_'+row).val();
        var vat = 0.05;
        var vat_charge = Number(rate) * Number(vat) * Number($("#qty_"+row).val());
        $("#vat_charge").val(vat_charge);
        $("#vat_charge_value").val(vat_charge);
        var grandTotal = Number(total) + Number(vat_charge);
          grandTotal = grandTotal.toFixed(2);
          $("#net_amount").val(grandTotal);
          $("#net_amount_value").val(grandTotal);
        subAmount();

        } else {
        alert('no row !! please refresh the page');
        }
    }

  // get the product information from the server
  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();  
    //  alert(product_id);  
    if(product_id == "") {
      $("#rate_"+row_id).val("");
      $("#rate_value_"+row_id).val("");
      $("#discount_"+row_id).val("");
      $("#discount_value_"+row_id).val("");
      $("#qty_"+row_id).val("");           

      $("#amount_"+row_id).val("");
      $("#amount_value_"+row_id).val("");

    } else {
      //  alert(product_id);
      var form_url = '<?php echo URLROOT;?>/orders/getProductValueById';
      $.ajax({
        url: form_url,
        type: 'post',
        data: {product_id : product_id},
       dataType: 'json',
        success:function(response) {
          // setting the rate value into the rate input field
          // console.log(response);
          $("#rate_"+row_id).val(response.price);
          $("#rate_value_"+row_id).val(response.price);

          $("#discount_"+row_id).val(response.discount);
          $("#discount_value_"+row_id).val(response.discount);

          $("#qty_"+row_id).val(1);
          $("#qty_value_"+row_id).val(1);
          var qty = $("#qty_"+row_id).val();
          var discount = $('#discount_'+row_id).val();
          var rate = $('#rate_'+row_id).val();
          
          var discount_price =Number(rate) * Number(discount)/100;
          // alert(discount_price);
          var total = Number(response.price) * Number(qty) - Number(discount_price);
          total = total.toFixed(2);
          $("#amount_"+row_id).val(total);
          $("#amount_value_"+row_id).val(total);
         
          var vat = 0.05;
            var vat_charge = Number(rate) * Number(vat) * Number(qty);;
            $("#vat_charge").val(vat_charge);
          $("#vat_charge_value").val(vat_charge);
            var grandTotal = Number(total) + Number(vat_charge);
              grandTotal = grandTotal.toFixed(2);
              $("#net_amount").val(grandTotal);
              $("#net_amount_value").val(grandTotal);
              
          subAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }


  }


    // calculate the total amount of the order
    function subAmount() {

        var tableProductLength = $("#product_info_table tbody tr").length;
        var totalSubAmount = 0;
        for(x = 0; x < tableProductLength; x++) {
          var tr = $("#product_info_table tbody tr")[x];
          var count = $(tr).attr('id');
          count = count.substring(4);

          totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
          
        } // /for

        totalSubAmount = totalSubAmount.toFixed(2);

            // sub total
            $("#gross_amount").val(totalSubAmount);
            $("#gross_amount_value").val(totalSubAmount);

            
            // total amount
            var totalAmount = (Number(totalSubAmount));
            totalAmount = totalAmount.toFixed(2);
            // $("#net_amount").val(totalAmount);
            // $("#totalAmountValue").val(totalAmount);
           
          


        } // /sub total amount

  function removeRow(tr_id)
  {
    $("#product_info_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }


</script>