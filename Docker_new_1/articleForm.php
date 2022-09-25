
<h2>Add articles </h2>
	<form action="addArticle.php" method="POST" enctype="multipart/form-data">

		<label for="titlr"> Article Title: </label>
		<input type="text" name = "title" id = "title" required/>

		<label for="content"> Article content: </label>
		<textarea name="content"  cols="30" rows="10" id="content" required></textarea>

		<label for="type">Choose category: </label>
		<select name="category" id="type">
			
				<?php
					require 'dbConnection.php';

					$querySel = "SELECT id, name FROM category";

					$category = $pdo->query($querySel);

					foreach($category as $row){
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					
					}
				?>

		</select>

		<input type="submit" name="submit" value="Submit" />
	</form>

