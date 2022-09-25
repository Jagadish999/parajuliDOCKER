<article>

    <h2>Edit Category</h2>
    <form action="editCategory.php" method="POST">

        <label for="CategoryName"> Category You Selected: </label>
        
            <?php
                require 'dbConnection.php';

                $id = (int) $_GET['id'];

                $select = "SELECT name FROM category WHERE id = $id";

                $category = $pdo->query($select);

                foreach($category as $lines){
                    $value = $lines['name'];
                }

                $availableOption = '<select name="category" id="category">
                            <option value="'.$id.'">'.$value.'</option>
                        </select>';
                echo $availableOption;
            ?>
            
        

        <label for="name">Edit Category name: </label>
        <input type="text" name = "name" id = "name" required/>

        <input type="submit" name="submit" value="Edit" />
    </form>


</article>

