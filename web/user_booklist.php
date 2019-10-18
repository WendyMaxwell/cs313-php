<?php
session_start();

require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book List</title>
</head>

<body>
	<a href="bookcatalogue.php">Back to Book Catalogue Page</a>
	<h1>Your Booklist</h1>
<div>
		<?php
		if (isset($_POST['username'])) {
			$username = ($_POST['username']);

			$sql = "SELECT author.first_name AS first_name, 
				author.last_name AS last_name, 
				book.title AS title, 
				book_user.book_id AS book_id, 
				book_user.user_id AS user_id 
			FROM book_user 
			INNER JOIN book ON book_user.book_id = book.id 
			INNER JOIN user_info ON book_user.user_id = user_info.id 
			INNER JOIN author ON book.author_id = author.id 
			WHERE user_info.username = '$username'
			ORDER BY last_name, first_name";

			foreach ($db->query($sql) as $row) {
				$url = "book_details.php?bookid=" . $row['book_id'] . "&userid=" . $row['user_id'];

				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$title = $row['title'];

				echo "<a href=\"$url\">$first_name $last_name, <i>$title</i></a><br>";
			}
		}
		?>
	</div>
	</body>
	</html>