<?php
require_once 'helpers/Helper.php';
?>





<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
    <!-- <div style="float: right;">
        <a href="index.php?controller=product&action=create" class="btn btn-primary btn-icon-text">Add New Menu</a>
    </div> -->
    <div class="card-body">
        <h4 class="card-title">Menu Detail</h4>
        <p class="card-description">
        Product / Menu <code>/ Menu Detail</code>
        </p>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Menu ID</th>
                <td><?php echo $product['code']?></td>
            </tr>
            <tr>
                <th>Menu Name</th>
                <td><?php echo $product['name']?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo $product['des']?></td>
            </tr>
            <tr>
                <th>Date of application</th>
                <td><?php echo $product['date']?>  <i class="mdi mdi-arrow-right-bold" style="margin: 0 10px;"></i>  <?php echo $product['date_end']?></td>
            </tr>
            <tr>
                <?php
                    $coler_value = '';
                    $status_value = '';
                    if ($product['status'] == 1) {
                        $coler_value = 'badge-success';
                        $status_value = 'Completed';
                    }
                    if ($product['status'] == 0) {
                        $coler_value = 'badge-warning';
                        $status_value = 'Expired';
                    }
                    
                ?>
                <th>Status</th>
                <!-- <td><?php echo $product['code']?></td> -->
                <td><label class="badge <?php echo $coler_value?>"><?php echo $status_value ? $status_value : $product['status'];?></label></td>
            </tr>
            <tr>
                <th>Dish</th>
                <!-- <td><?php echo $product['dish']?></td> -->
                <td>

                <?php foreach ($products as $pro) :?>
                    <div class="list-group-item" style="display: flex;">
                        <img src="<?php echo $pro['image']; ?>" height="40" width="40">
                        <div style="margin: 5px;"><?php echo $pro['title']; ?><br><?php echo number_format($pro['price'], 0, ',', '.'); ?>đ</div>
                    </div>
                <?php endforeach;?>


                </td>
            </tr>
            <tr>
                <th>User added</th>
                <td><?php echo $product['user_id']?></td>
        </table>
        </div>
    </div>
    <div style="margin-left: 20px;">
        <a href="index.php?controller=product" class="btn btn-outline-primary btn-fw">Cancel</a>
    </div>
    </div>
</div>