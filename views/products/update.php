<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<form class="form-sample" method="POST">
    <h4 class="card-title">Menu Update</h4>
<div class="row">

<div class="col-md-6 ">
    <div class="card">
    <div class="card-body">
        <!-- <form class="form-sample" method="POST"> -->
        <p class="card-description">
        Product / Menu<code>/ Menu Update</code>
        </p>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu code *</label>
                <div class="col-sm-9">
                <input type="text" name="code" class="form-control" value="<?php echo isset($_POST['code']) ? $_POST['code'] : $product['code'] ?>"/>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu name *</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $product['name'] ?>"/>
                </div>
            </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date of application *</label>
                <div class="col-sm-9">
                    <input type="datetime-local" name="date" class="form-control" value="<?php echo isset($_POST['date']) ? $_POST['date'] : $product['date'] ?>"/>
                </div>
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="datetime-local" name="date_end" class="form-control" value="<?php echo isset($_POST['date_end']) ? $_POST['date_end'] : $product['date_end'] ?>"/>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Menu status *</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status">
                        <?php
                        $selected_disabled = '';
                        $selected_actived = '';
                        if ($product['status'] == 0) {
                            $selected_disabled = 'selected';
                        } else {
                            $selected_actived = 'selected';
                        }
                        if (isset($_POST['status'])) {
                            switch ($_POST['status']) {
                                case 0:
                                    $selected_disabled = 'selected';
                                    break;
                                case 1:
                                    $selected_actived = 'selected';
                                    break;
                            }
                        }
                        ?>
                        <option value="1" <?php echo $selected_actived ?>>Actived</option>
                        <option value="0" <?php echo $selected_disabled ?>>Disabled</option>
                    </select>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description menu</label>
                <div class="col-sm-9">
                    <input type="text" name="des" class="form-control" value="<?php echo isset($_POST['des']) ? $_POST['des'] : $product['des'] ?>"/>
                </div>
            </div>
            </div>
        </div>
        <!-- </form> -->
    </div>
    </div>
</div>

<div class="col-md-6 ">
    <div class="card">
        <div class="card-body">
            <p class="card-description">
            <code></code>
            </p>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group row">
                    <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                        <i class="icon-search"></i>
                        </span>
                    </div>
                    <!-- <input type="text" class="form-control" id="navbar-search-input" placeholder="Search food name" aria-label="search" aria-describedby="search"> -->
                        <input id="timkiem" type="text" name="search" class="form-control" placeholder="Search food name" autocomplete="off">
                        <!-- <button class="btn btn-primary">Tìm kiếm</button> -->
                    </div>
                    <ul class="list-group" id="result" style="display: none;position: absolute;z-index:9999; background:#FFFFFF;width:100%;list-style: none;margin-top: 50px;padding-bottom: 250px;"></ul>
                </div>
                </div>
            </div>
            <!-- <div class="row"> -->
            <!-- <?php echo isset($_POST['dish']) ? $_POST['dish'] : $product['dish'] ?> -->
                <!-- <div class="col-md-12"> -->
                <!-- <div class="form-group row">
                    <ul class="list-group" id="add" style="background:white;width:100%;list-style: none">
                    <?php foreach ($products as $pro) :?>
                        <li class="list-group-item" style="cursor: pointer; display: flex;"><img src="<?php echo $pro['image']?>" height="40" width="40"><div><?php echo $pro['title']?><br><?php echo $pro['price']?></div><button class="btn btn-danger ml-auto" value="<?php echo $pro['id']?>">Xóa</button></li>

                        <li class="list-group-item" style="cursor: pointer; display: flex;"><img src="assets/uploads/vitquay.jpg" height="40" width="40"><div>Vịt quay bắc kinh<br>199000</div><button class="btn btn-danger ml-auto" value="1">Xóa</button></li>

                    
                    <?php endforeach;?>
            
                    </ul>
                </div> -->
                <!-- </div> -->
            <!-- </div> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <ul class="list-group" id="add" style="background:white;width:100%;list-style: none">
                            <?php foreach ($products as $pro) :?>
                                <li class="list-group-item" style="cursor: pointer; display: flex;">
                                    <img src="<?php echo $pro['image']; ?>" height="50" width="50">
                                    <div style="margin-left: 5px;"><?php echo $pro['title']; ?><br><?php echo number_format($pro['price'], 0, ',', '.'); ?>đ</div>
                                    <button class="btn btn-danger ml-auto delete-btn" value="<?php echo $pro['id']?>">Xóa</button>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <?php echo $str = str_replace(' ', '', isset($_POST['dish']) ? $_POST['dish'] : $product['dish']); ?> -->

            
            <input type="hidden" name="dish" class="form-control" id="dish" value="<?php echo $str = str_replace(' ', '', isset($_POST['dish']) ? $_POST['dish'] : $product['dish']); ?>"/>
            <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php echo $_SESSION['user']['username']?>"/>
        </div>
    </div>
</div>


</div>
<div style="float: right; margin-right: 30px;">
    <a href="index.php?controller=product" class="btn btn-outline-primary btn-fw">Cancel</a>
    <input type="submit" name="submit" value="Update" class="btn btn-primary btn-icon-text">
</div>
</form>
</div>
</div>
</div>

<!-- <script>
    // Đảm bảo rằng JavaScript này được đặt ở phía dưới nút HTML hoặc sau khi trang đã tải xong
    document.addEventListener('DOMContentLoaded', function() {
        // Lặp qua tất cả các nút "Xóa"
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Truy cập đến phần tử cha (phần tử li) của nút "Xóa", sau đó xóa nó khỏi DOM
                var listItem = this.parentNode;
                listItem.parentNode.removeChild(listItem);
            });
        });
    });
    
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var listItem = this.parentNode;
                listItem.parentNode.removeChild(listItem);

                // Thêm đoạn code jQuery vào đây
                var buttonValue = $(this).val();
                var curValue = $('#dish').val();


                // Chia chuỗi curValue thành mảng các giá trị
                var valuesArray = curValue.split(',');
                console.log(buttonValue);


                // Kiểm tra xem buttonValue có tồn tại trong mảng valuesArray không
                if (valuesArray.includes(buttonValue)) {
                    // Nếu tồn tại, loại bỏ buttonValue khỏi mảng
                    valuesArray = valuesArray.filter(value => value !== buttonValue);
                    // console.log(valuesArray);


                    // Gán giá trị mới cho #dish bằng cách nối các phần tử còn lại trong mảng với nhau bằng dấu ','
                    $('#dish').val(valuesArray.join(','));
                }
            });
        });
    });
</script>