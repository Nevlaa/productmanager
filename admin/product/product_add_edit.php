<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">

    <h1 class="top">Product Manager - Add Product</h1>
    <form action="index.php" method="post" id="add_edit_product_form">
        <input type="hidden" name="action" value="add_product" />
        <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>" />

        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : 
                if ($category['categoryID'] == $product['categoryID']) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            ?>
            <option value="<?php echo $category['categoryID']; ?>"
                <?php echo $selected ?>>
                <?php echo $category['categoryName']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br />

        <label>Code:</label>
        <input type="input" name="code" />
        <br />

        <label>Name:</label>
        <input type="input" name="name" />
        <br />

        <label>List Price:</label>
        <input type="input" name="price" />
        <br />

        <label>Discount Percent:</label>
        <input type="input" name="discount_percent"  />
        <br />

        <label>Description:</label>
        <textarea name="description" rows="10"></textarea>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />

    </form>
    <h2>How to format the Description entry</h2>
    <ul>
        <li>Use two returns to start a new paragraph.</li>
        <li>Use an asterisk to mark items in a bulleted list.</li>
        <li>Use one return between items in a bulleted list.</li>
        <li>Use standard HMTL tags for bold and italics.</li>
    </ul>

</div>
<?php include '../../view/footer.php'; ?>