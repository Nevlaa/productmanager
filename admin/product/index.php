<?php
require_once('../../util/main.php');
require_once('../../util/tags.php');
require_once('../../model/database.php');
require_once('../../model/product_db.php');
require_once('../../model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

$action = strtolower($action);
switch ($action) {
    case 'list_products':
        // get categories and products
        $category_id = $_GET['category_id'];
        if (empty($category_id)) {
            $category_id = 1;
        }
        $current_category = get_category($category_id);
        $categories = get_categories();
        $products = get_products_by_category($category_id);

        // display product list
        include('product_list.php');
        break;
    case 'view_product':
        $categories = get_categories();
        $product_id = $_GET['product_id'];
        $product = get_product($product_id);
        include('product_view.php');
        break;
    case 'delete_product':
        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        delete_product($product_id);
//        $count = get_count_product($category_id);
        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
        break;
    case 'show_add_edit_form':
        $category_id = $_POST['category_id'];
        $product = get_products_by_category($category_id);
        $categories = get_categories();
        include('product_add_edit.php');
        break;
    case 'add_product':
        $category_id = $_POST['category_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $product_id = add_product($category_id, $code, $name,
                    $description, $price, $discount_percent);
            $product = get_product($product_id);
             header("Location: .?list_products=$category_id");
        }
        break;
    case 'update_product':
        $product_id = $_POST['product_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];
        $category_id = $_POST['category_id'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            update_product($product_id, $code, $name, $description,
                           $price, $discount_percent, $category_id);
            $product = get_product($product_id);
            include('product_view.php');
        }
        break;
    case 'list_categories':
        $categories = get_categories();
        include('category_list.php');
        break;
    case 'add_category' :
        $name = $_POST['name'];

        // Validate inputs
        if (empty($name)) {
            $error = 'Invalid category data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            add_category($name);
            header('Location: .?action=list_categories');
        }
        break;
    case 'delete_category' :
        $category_id = $_POST['category_id'];
        $row = get_count_product($category_id);
        if(!empty($row)){
            $error =  "Not allowed to delete category with products.
                       Check product list and try again.";
            include('../../errors/error.php');  
        } else {
            delete_category($category_id);
            header('Location: .?action=list_categories');
        }
        break;
}
?>