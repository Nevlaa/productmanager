<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Product Manager - View Product</h1>
    
    <!-- display product -->
    <?php include '../../view/product.php'; ?>

    <!-- display buttons -->
    <div id="buttons">
        <form action="" method="post" >
            <input type="hidden" name="action" value="delete_product">
            <input type="hidden" name="product_id"
                   value="<?php echo $product['productID']; ?>" />
            <input type="hidden" name="category_id" 
                   value="<?php echo $product['categoryID']; ?>" />
            <input type="submit" value="Delete Product">
        </form>
    </div>
</div>
<?php include '../../view/footer.php'; ?>