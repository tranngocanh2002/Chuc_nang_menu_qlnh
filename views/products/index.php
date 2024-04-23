<?php
require_once 'helpers/Helper.php';
?>


<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <!-- <div style="float: right;">
        <a href="index.php?controller=product&action=create" class="btn btn-primary btn-icon-text">Add New Menu</a>
    </div> -->
    <section class="content-header">
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->error)): ?>
        <div class="alert alert-danger">
            <?php
            echo $this->error;
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
    </section>

    <div class="card-body">
        <div style="float: right;">
            <a href="index.php?controller=product&action=create" class="btn btn-primary btn-icon-text">Add New Menu</a>
        </div>
        <h4 class="card-title">Menu List</h4>
        <p class="card-description">
        Product <code>/ Menu</code>
        </p>
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Menu ID</th>
                <th>Menu Name</th>
                <th>Description</th>
                <th>Date of application</th>
                <th>Status</th>
                <th>User added</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product):?>
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
                    <tr>
                        <td><?php echo $product['code']?></td>
                        <td><?php echo $product['name']?></td>
                        <td><?php echo $product['des']?></td>
                        <td><?php echo $product['date']?> <i class="mdi mdi-arrow-right-bold" style="margin: 0 5px;"></i> <?php echo $product['date_end']?></td>
                        <td><label class="badge <?php echo $coler_value?>"><?php echo $status_value ? $status_value : $product['status'];?></label></td>
                        <td><?php echo $product['user_id']?></td>
                        <td>
                            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']?>"><i class="mdi mdi-eye"></i></a>
                            <a href="index.php?controller=product&action=update&id=<?php echo $product['id']?>"><i class="mdi mdi-grease-pencil"></i></a>
                            <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']?>" onclick="return confirm('Are you sure delete?')"><i class="mdi mdi-delete-forever"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            <!-- <tr>
                <td>John</td>
                <td>53275533</td>
                <td>14 May 2017</td>
                <td><label class="badge badge-info">Fixed</label></td>
            </tr>
            <tr>
                <td>Peter</td>
                <td>53275534</td>
                <td>16 May 2017</td>
                <td><label class="badge badge-success">Completed</label></td>
            </tr>
            <tr>
                <td>Dave</td>
                <td>53275535</td>
                <td>20 May 2017</td>
                <td><label class="badge badge-warning">In progress</label></td>
            </tr> -->
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>