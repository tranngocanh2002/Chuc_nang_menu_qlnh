<?php
require_once 'models/Model.php';

class Product extends Model
{

    public $id;
    public $code;
    public $name;
    public $date;
    public $date_end;
    public $status;
    public $des;
    public $dish;
    public $user_id;
    public $created_at;
    public $updated_at;
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }

    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY products.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
//    public function getAllImg() {
//        $obj_select = $this->connection
//            ->prepare("SELECT * FROM products_img
//                        INNER JOIN products ON products_img.products_img_id = products.id
//                        WHERE TRUE $this->str_search
//                        ORDER BY products_img.id DESC
//                        ");
//        $arr_select = [];
//        $obj_select->execute($arr_select);
//        $products_img = $obj_select->fetchAll(PDO::FETCH_ASSOC);
//
////        echo '<pre>';
////        print_r($products_img);
////        die();
//        return $products_img;
//    }

    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            // ->prepare("SELECT products.*, categories.name AS category_name FROM products 
            //             INNER JOIN categories ON categories.id = products.category_id
            //             WHERE TRUE $this->str_search
            //             ORDER BY products.updated_at DESC, products.created_at DESC
            //             LIMIT $start, $limit
            //             ");
            ->prepare("SELECT * FROM menu WHERE TRUE $this->str_search");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO menu(code, name, date, date_end, status, des, dish, user_id) 
                                VALUES (:code, :name, :date, :date_end, :status , :des, :dish, :user_id)");
        $arr_insert = [
            ':code' => $this->code,
            ':name' => $this->name,
            ':date' => $this->date,
            ':date_end' => $this->date_end,
            ':status' => $this->status,
            ':des' => $this->des,
            ':dish' => $this->dish,
            ':user_id' => $this->user_id,
        ];
        return $obj_insert->execute($arr_insert);
    }


    public function last_id(){
        $last_id = $this->connection->lastInsertId();
//        echo '<pre>';
//        print_r($last_id);
        return $last_id;
    }
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM menu WHERE id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }



    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE menu SET code=:code, name=:name, des=:des, date=:date, date_end=:date_end, dish=:dish, user_id=:user_id, status=:status, updated_at=:updated_at 
                WHERE id = $id
");
        $arr_update = [
            ':code' => $this->code,
            ':name' => $this->name,
            ':des' => $this->des,
            ':date' => $this->date,
            ':date_end' => $this->date_end,
            ':dish' => $this->dish,
            ':user_id' => $this->user_id,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM menu WHERE id = $id");
        return $obj_delete->execute();
    }
}