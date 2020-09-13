<?php include '../view/header.php'; ?>
<div id="main">

    <h1 class="top">Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
    <!-- add categories table here -->
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>              
            <td><form action="index.php" method="post"
                      id="add_category_form">
                <input type="hidden" name="action" value="delete_category"/>    
                <input type="hidden" name="category_id"
                       value="<?php echo $category['categoryID']; ?>" />
                <input type="submit" value="Delete" />
            </form></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    <!-- add form for adding a category here -->
    <form action="index.php" method="post" id="add_category_form">
        <input type="hidden" value="add_category" name="action"/>
      <label>Name:&nbsp;&nbsp;</label>
      <input type="input" name="name" autocomplete="off"/>
      <input type="submit" value="Add" />
      <br />
    </form>
    <p><a href="index.php?action=list_products">List Products</a></p>

</div>
<?php include '../view/footer.php'; ?>