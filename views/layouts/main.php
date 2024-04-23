<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SWind</title>
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/image_9.png" />
</head>
<body">




<div class="container-scroller">
    <?php require_once 'nav.php';?>
    <div class="container-fluid page-body-wrapper">
        <?php require_once 'header.php';?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
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
                    <?php echo $this->content; ?>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
<!-- ./wrapper -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#timkiem').keyup(function() {
            $('#result').html('');
            var search = $('#timkiem').val();
            if(search != ''){
                var expression = new RegExp(search,"i");
                // alert(expression);
                $.getJSON('assets/json/movies.json', function(data){
                    $.each(data,function(key, value){
                        if (value.title.search(expression) != -1){
                            $('#result').css('display','inherit');
                            var image_check = value.image.substring(0, 4);
                            if (image_check.startsWith('http')) {
                                $('#result').append('<li style="cursor:pointer;display:flex;background:#F4F6FE;" class="list-group-item"><img src="'+value.image+'"height="50" width="50" /> <div>'+value.title+'<br/>'+value.price+'</div ></li>');
                            } else {
                                $('#result').append('<li style="cursor:pointer;display:flex;background:#F4F6FE;" class="list-group-item"><img src="'+value.image+'"height="50" width="50" /> <div style="margin: 5px;">'+value.title+'<br/>'+value.price+'</div > </li>');
                            }
                        }
                        
                    });
                });
            } else {
                $('#result').css('display','none');
            }
        })
    })
    $('#result').on('click', 'li', function(){
        var click_text = $(this).text();
        var click_content = $(this).html();
        var $click_content = $('<div>').html(click_content);
        var images = $click_content.find('img');
        var imageUrls = [];
        images.each(function() {
            var imageUrl = $(this).attr('src');
            imageUrls.push(imageUrl);
        });
        var ketQua = click_text.replace(/\d.*/, "");
        $('#result').html('');
        $('#result').css('display','none');
        $('#add').show();
        // $('#add').append('<li style="cursor:pointer;display:flex" class="list-group-item"><img src="'+imageUrls[0]+'"height="40" width="40" /> <div>'+ketQua+'<br/></div ></li>');
        var chuoiHienTai = $(this).text().trim();
        var price = chuoiHienTai.match(/\d+$/g);

        var usedUrls = [];

        $('#add li img').each(function() {
            usedUrls.push($(this).attr('src'));
        });



        var jsonFile = 'assets/json/movies.json';

        var searchString = imageUrls[0].trim();
        $.getJSON(jsonFile, function(data) {
            $.each(data, function(index, movie) {
                if (movie.image === searchString) {

                    var currentValue = $('#dish').val();
                    if (currentValue.indexOf(movie.id) === -1) {
                        var newValue = '';
                        if (currentValue !== '') {
                            newValue = currentValue + ',' + movie.id;
                        } else {
                            newValue = movie.id;
                        }
                        $('#dish').val(newValue);
                    }
                    return false;

                }
            });
        });




        if (usedUrls.indexOf(imageUrls[0]) === -1) {
            // $('#add').append('<li style="cursor:pointer;display:flex" class="list-group-item"><img src="'+imageUrls[0]+'" height="40" width="40" /> <div>'+ketQua+'<br/>'+price[0]+'</div ></li>');

            // var searchString = imageUrls[0].trim();
            // $.getJSON(jsonFile, function(data) {
            //     $.each(data, function(index, movie) {
            //         if (movie.image === searchString) {
            //             var idPro = movie.id;
            //             return false;

            //         }
            //     });
            // });
            var idPro; // Khai báo biến idPro ở ngoài hàm

            var jsonFile = 'assets/json/movies.json';

            // Định nghĩa hàm callback để xử lý giá trị idPro
            function handleIdPro(idPro) {
                // console.log(idPro);
                var listItem = $('<li>').addClass('list-group-item').css({'cursor': 'pointer', 'display': 'flex'});
                var imgElement = $('<img>').attr('src', imageUrls[0]).attr('height', '50').attr('width', '50');
                var divElement = $('<div style="margin-left: 10px;">').html(ketQua + '<br/>' + parseFloat(price[0]).toLocaleString('vi-VN') + 'đ');
                var deleteButton = $('<button>').text('Xóa').addClass('btn btn-danger ml-auto').val(idPro);
                // console.log(idPro);
                // console.log(deleteButton);

                
                // Thêm sự kiện click cho nút xóa
                deleteButton.on('click', function() {
                    $(this).parent().remove();
                    // $('#dish').val('');
                    var curValue = $('#dish').val();
                    var buttonValue = deleteButton.val();
                    // console.log(buttonValue);

                    var valuesArray = curValue.split(',');
                    // console.log(valuesArray);


                    // Kiểm tra xem buttonValue có tồn tại trong mảng valuesArray không
                    if (valuesArray.includes(buttonValue)) {
                        // Nếu tồn tại, loại bỏ buttonValue khỏi mảng
                        valuesArray = valuesArray.filter(value => value !== buttonValue);
                        
                        // Gán giá trị mới cho #dish bằng cách nối các phần tử còn lại trong mảng với nhau bằng dấu ','
                        $('#dish').val(valuesArray.join(','));
                    }


                });

                // Thêm các phần tử vào mục
                listItem.append(imgElement).append(divElement).append(deleteButton);

                // Thêm mục vào #add
                $('#add').append(listItem);
            }

            function getIdPro(callback) {
                var idPro; // Khai báo biến idPro ở ngoài hàm

                $.getJSON(jsonFile, function(data) {
                    var searchString = imageUrls[0].trim();
                    $.each(data, function(index, movie) {
                        if (movie.image === searchString) {
                            idPro = parseInt(movie.id); // Chuyển đổi sang kiểu số
                            return false;
                        }
                    });
                }).done(function() {
                    // Sau khi dữ liệu đã được tải xong và idPro được gán giá trị, gọi callback
                    if (typeof callback === 'function') {
                        callback(idPro);
                    }
                });
            }

            // Gọi hàm để bắt đầu quá trình lấy giá trị idPro
            getIdPro(handleIdPro);

            // var listItem = $('<li>').addClass('list-group-item').css({'cursor': 'pointer', 'display': 'flex'});
            // var imgElement = $('<img>').attr('src', imageUrls[0]).attr('height', '40').attr('width', '40');
            // var divElement = $('<div>').html(ketQua + '<br/>' + price[0]);
            // // var deleteButton = $('<button>').text('Xóa').addClass('btn btn-danger ml-auto').val(1);
            // // console.log(idPro);
            // // console.log(deleteButton);

            
            // // Thêm sự kiện click cho nút xóa
            // deleteButton.on('click', function() {
            //     $(this).parent().remove();
            //     // $('#dish').val('');
            //     var curValue = $('#dish').val();
            //     var buttonValue = deleteButton.val();
            //     // console.log(buttonValue);

            //     var valuesArray = curValue.split(',');
            //     // console.log(valuesArray);


            //     // Kiểm tra xem buttonValue có tồn tại trong mảng valuesArray không
            //     if (valuesArray.includes(buttonValue)) {
            //         // Nếu tồn tại, loại bỏ buttonValue khỏi mảng
            //         valuesArray = valuesArray.filter(value => value !== buttonValue);
                    
            //         // Gán giá trị mới cho #dish bằng cách nối các phần tử còn lại trong mảng với nhau bằng dấu ','
            //         $('#dish').val(valuesArray.join(','));
            //     }


            // });

            // // Thêm các phần tử vào mục
            // listItem.append(imgElement).append(divElement).append(deleteButton);

            // // Thêm mục vào #add
            // $('#add').append(listItem);
        }




        // var currentValue = $('#dish').val();

        // if (currentValue.indexOf(imageUrls[0]) === -1) {
        //     var newValue = '';
        //     if (currentValue !== '') {
        //         newValue = currentValue + ',' + imageUrls[0];
        //     } else {
        //         newValue = imageUrls[0];
        //     }
        //     $('#dish').val(newValue);
        // }






        // var jsonFile = 'assets/json/movies.json';

        // var searchString = imageUrls[0].trim();
        // $.getJSON(jsonFile, function(data) {
        //     $.each(data, function(index, movie) {
        //         if (movie.image === searchString) {

        //             var currentValue = $('#dish').val();
        //             if (currentValue.indexOf(movie.id) === -1) {
        //                 var newValue = '';
        //                 if (currentValue !== '') {
        //                     newValue = currentValue + ',' + movie.id;
        //                 } else {
        //                     newValue = movie.id;
        //                 }
        //                 $('#dish').val(newValue);
        //             }
        //             return false;

        //         }
        //     });
        // });

    })
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.timkiem').keyup(function() {
            $('.result').html('');
            var search = $('.timkiem').val();
            if(search != ''){
                var expression = new RegExp(search,"i");
                // alert(expression);
                $.getJSON('json/movies.json', function(data){
                    $.each(data,function(key, value){
                        if (value.title.search(expression) != -1 || value.description.search(expression) != -1){
                            $('.result').css('display','inherit');
                            $('.result').append('<li style="cursor:pointer" class="list-group-item"><img src="uploads/movie/'+value.image+'"height="40" width="40" /> '+value.title+'<br/> |<span class="text-mited">'+value.description+'</span></li>');
                        }
                        
                    });
                });
            } else {
                $('.result').css('display','none');
            }
        })
    })
    $('.result').on('click', 'li', function(){
        var click_text = $(this).text().split('|');
        $('.timkiem').val($.trim(click_text[0]));
        $('.result').html('');
        $('.result').css('display','none');
    })
</script> -->


</body>
</html>
