<?php require_once APPROOT .'/views/inc/header.php'; ?>
<div class="wrapper ">
  <?php require_once APPROOT .'/views/inc/sidebar.php'; ?>
    <div class="main-panel" id="main-panel">
    <?php require_once APPROOT .'/views/inc/navbar.php'; ?>
      <div class="panel-header panel-header-lg">
<div class="createForm"> 
<form method="POST" action="<?php echo URLROOT;?>/expenses/store">


  <div class="form-group ">
    <label for="exampleFormControlInput1">Amount</label>
    <input type="number" class="form-control" name="amount" id="exampleFormControlInput1" placeholder="Enter Amount here">
  </div>

  <div class="form-group ">
    <label for="exampleFormControlInput1">Qty</label>
    <input type="number" class="form-control" name="qty" id="exampleFormControlInput1" placeholder="Enter Qty here">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="category" id="exampleFormControlSelect1">
      <?php foreach ($data['categories'] as $category) { ?>
          <option value="<?php echo $category['id']; ?>">
              <?php echo $category['name']; ?>
          </option>
      <?php } ?>
    </select>
  </div>
  
  <div class="col-md-12 text-center"">
    <button type="reset" class="btn btn-warning w-25">Reset</button>
    <button type="submit" class="btn btn-info w-25">Submit</button>
  </div>  
</form>
</div>
<?php require_once APPROOT .'/views/inc/footer.php'; ?>
