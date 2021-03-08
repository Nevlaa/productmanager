<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<section> 
 <h1>Product Manager - Category List</h1>
    <table id="category_table">
        <tr>
            <th class="left">Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </td>              
            <td>
                <form action="index.php" method="post"
                      class="delete_product_form">
                    <input type="hidden" name="category_id"
                       value="<?php echo $category['categoryID']; ?>" />
                    <input type="hidden" value="delete_category" name="action"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h2>Add Category</h2>
    <!-- add code for the form here -->
    <form action="index.php" method="post" id="add_category_form">
      <input type="hidden" value="add_category" name="action"/>
      <input type="input" name="name" autocomplete="off"/>
      <input type="submit" value="Add" />
    </form>
    <p><a href="index.php?action=list_products">List Products</a></p>
</section> <!-- end main -->
<?php include '../../view/footer.php'; ?>
