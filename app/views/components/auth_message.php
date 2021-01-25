<?php if(isset($_SESSION['error'])) { ?>
    <p class="text-danger my-3 font-weight-bold">
        <?php echo $_SESSION['error'];
        unsetMessage('error');
        ?>
    </p>
<?php } ?>

<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['success'];
        unsetMessage('success');
        ?>
     </div>
<?php } ?>
