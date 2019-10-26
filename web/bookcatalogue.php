<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Book Catalogue</title>
</head>

<body>
	<a href="assignments.php">Back to Assignments Page</a>
	<h1>Book Catalogue</h1>


	<form name="list_all" action="bookcatalogue.php" method="POST">
		<label>Show list of all books in catalogue (any user)</label><br>
		<input type="submit" name="show_all">
	</form>

	<div>
		<?php
		if (isset($_POST['show_all'])) {

			$sql = 'SELECT author.name AS name, 
				book.title AS title 
			FROM author
			INNER JOIN book on author_id = author.id
			ORDER BY name';

			foreach ($db->query($sql) as $row) {
				$name = $row['name'];
				$title = $row['title'];

				echo "<p>$name, <i>$title</i></p>";
			}
		}
		?>
	</div>

	<form name="list_users_books" action="user_booklist.php" method="POST">
		<label>Show all books you own</label>
		<input type="text" name="username" placeholder="Your username"><br>
		<input type="submit" name="submit">
	</form>

	<form name="new_books" action="new_books.php" method="POST">
		<label>Go to page to enter new books</label>
		<input type="text" name="username" placeholder="Your username"><br>
		<input type="submit" name="submit">
	</form>



</body>
</html>