<article>
    <?php

        echo '<h2>Edit Category</h2>';

        require 'dbConnection.php';

        $find = "SELECT id, name FROM category";

        $category = $pdo->query($find);

        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>';

        foreach($category as $row){

            $tableInfo = '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td><button><a href = "adminArticles.php?adminActivity=editForm&id='.$row['id'].'">EDIT</a><button></td>
                            <td><button><a href = "deleteCategory.php?id='.$row['id'].'">DELETE</a><button></td>
                          </tr>';

            echo $tableInfo;
        }
        echo '</table>';        
    ?>

</article>