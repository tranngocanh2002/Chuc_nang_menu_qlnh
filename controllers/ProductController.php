<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Pagination.php';


class ProductController extends Controller
{
    public function index()
    {
        $product_model = new Product();
        $count_total = $product_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'product',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $products = $product_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);

        $pages = $pagination->getPagination();

//        echo '<pre>';
//        print_r($products_img);
//        die();
        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $date_end = $_POST['date_end'];
            $status = $_POST['status'];
            $des = $_POST['des'];
            $dish = $_POST['dish'];
            $user_id = $_POST['user_id'];
            // if (empty($title)) {
            //     $this->error = 'Không được để trống name';
            // }
            if (empty($this->error)) {
                $product_model = new Product();
                $product_model->code = $code;
                $product_model->name = $name;
                $product_model->date = $date;
                $product_model->date_end = $date_end;
                $product_model->status = $status;
                $product_model->dish = $dish;
                $product_model->des = $des;
                $product_model->user_id = $user_id;
                $is_insert = $product_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert data successfully';
                } else {
                    $_SESSION['error'] = 'Insert data failed';
                }

                header('Location: index.php?controller=product');
                exit();
            }
        }

        $this->content = $this->render('views/products/create.php', [
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        

        $array = explode(",", $product['dish']);
        $jsonFile = 'assets/json/movies.json';
        $jsonData = file_get_contents($jsonFile);
        $movies = json_decode($jsonData, true);
        $products = [];


        foreach ($array as $value) {
            // echo $value . "<br>";
            foreach ($movies as $movie) {
                if ($movie['id'] == $value) {
                    $products[] = $movie;
                }
            }
        }

        $this->content = $this->render('views/products/detail.php', [
            'product' => $product,
            'products' => $products,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);


        $array = explode(",", $product['dish']);
        $jsonFile = 'assets/json/movies.json';
        $jsonData = file_get_contents($jsonFile);
        $movies = json_decode($jsonData, true);
        $products = [];


        foreach ($array as $value) {
            // echo $value . "<br>";
            foreach ($movies as $movie) {
                if ($movie['id'] == $value) {
                    $products[] = $movie;
                }
            }
        }




        
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $date_end = $_POST['date_end'];
            $status = $_POST['status'];
            $des = $_POST['des'];
            $dish = $_POST['dish'];
            $user_id = $_POST['user_id'];
            // if (empty($title)) {
            //     $this->error = 'Không được để trống title';
            // } 
            if (empty($this->error)) {
                
                $product_model->code = $code;
                $product_model->name = $name;
                $product_model->date = $date;
                $product_model->date_end = $date_end;
                $product_model->status = $status;
                $product_model->dish = $dish;
                $product_model->des = $des;
                $product_model->user_id = $user_id;
                $product_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $product_model->update($id);

                if ($is_update) {
                    $_SESSION['success'] = 'Update data successfully';
                } else {
                    $_SESSION['error'] = 'Update data failed';
                }
                header('Location: index.php?controller=product');
                exit();
            }
        }

        $this->content = $this->render('views/products/update.php', [
            'product' => $product,
            'products' => $products,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Deleted data successfully';
        } else {
            $_SESSION['error'] = 'Delete data failed';
        }
        header('Location: index.php?controller=product');
        exit();
    }
}