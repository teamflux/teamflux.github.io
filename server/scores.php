<?php

require_once("DB.class.php");
require_once("LIB_project1.php");


$itemData = $db->getAllItems();
$itemData = sortItems($itemData);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Sparkle Shop</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700|Karla" rel="stylesheet">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>
<body>
	<?php
		createMenu();
	?>
	<main>
	<section class="sale">
		<h1>For Sale</h1>
		<?php
			genSaleItems($itemData[0]);
		?>
	</section>
	<section id="products">
		<h1>Catalog</h1>
		<?php
			genPages($itemData[1]);

			//get page number and generate items on that page
			if(isset($_GET['page'])){
				if(is_numeric($_GET['page'])){
					$_GET['page'] -= 1;
					if(($_GET['page']*5 < count($itemData[1]) && $_GET['page'] >= 0)){
						genItems($itemData[1], $_GET['page']);
					}
					else{
						echo "Invalid Page Number";
					}
				}
				else{
					echo "Invalid Page Number";
				}
			}
			else
				genItems($itemData[1], 0);
		?>
	</section>
	</main>
</body>
</html>