<?php require_once('data/database.php'); ?>
<?php
    class ProductB{
        private $product_list = null;
        public function GetProductsByID($product_id){
            $sql = "SELECT * FROM Product WHERE product_id={$product_id}";
            $db = new Database();
            $result = $db->select($sql);
            return $result;
        }
        public function GetAllProductsFromCategory($cat_id){
            $sql = "SELECT * FROM Product WHERE cat_id={$cat_id}";
            $db = new Database();
            $result = $db->select($sql);
            return $result;

        }
        public function GetAllProduct(){
            $sql = "SELECT * FROM product";
            $db = new Database();
            $result = $db->select($sql);
            return $result;
        }
      

    }
?>