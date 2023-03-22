<?php

session_start();

require "./data.php";
$aktualniInstance = NULL;

//zpracovani formulare pro prihlaseni
if (array_key_exists("login-submit", $_POST)) {
	$jmeno = $_POST["jmeno"];
	$heslo = $_POST["heslo"];

	if ($jmeno = "admin" && $heslo == "cici123") {
		$_SESSION["jePrihlasen"] = true;
	} else {
		$chybaPrihlaseni = "Zadané údaje jsou špatné";
	}
}

if (array_key_exists("logout-submit", $_GET)) {
	unset($_SESSION["jePrihlasen"]);
	//procistime url, aby tam už nebylo ?logout
	header("Location: ?");
	exit;
}

if (array_key_exists("jePrihlasen", $_SESSION)) {
	//zpracovani uzivatel chce editovat stranku
	if (array_key_exists("edit", $_GET)) {
		$idStranky = $_GET["edit"];
		$aktualniInstance = $seznamStranek[$idStranky];
	}

	//zpracovani aktualizace stranky
	if (array_key_exists("aktualizovat-submit", $_POST)) {
		$novyObsah = $_POST["obsah-stranky"];
		$aktualniInstance->setObsah($novyObsah);
	}
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin stránka</title>
</head>

<body>
	<h1>Admin stránka</h1>

	<?php

	if (array_key_exists("jePrihlasen", $_SESSION)) {
		//je prihlasen
		echo "Jste přihlášen";
		echo "<br>";
		echo "<a href='?logout-submit'>Odhlásit se</a>";

		echo "<ul>";
		foreach ($seznamStranek as $stranka) {
			//admin.php?edit=kontakt
			echo "<li><a href='?edit={$stranka->getId()}'>{$stranka->getId()}</a></li>";
		}
		echo "</ul>";


		//zde vykreslime editační okno
		if ($aktualniInstance != NULL) { ?>
			<form action="" method="post">
				<label for="koala">Obsah stránky</label>
				<textarea name="obsah-stranky" id="koala" cols="100" rows="20"><?php echo $aktualniInstance->getObsah() ?></textarea>
				<input type="submit" name="aktualizovat-submit" value="Aktualizovat">
			</form>
			<!-- pripojime knihovnu tinymce -->
			<script src="./vendor/tinymce/tinymce/tinymce.min.js"></script>
			<script>
                    tinymce.init({
                        selector: "#koala",
                        language: "cs",
                        language_url: "<?php echo dirname($_SERVER["PHP_SELF"]); ?>/vendor",
                        entity_encoding: "raw",
                        verify_html: false,
                        content_css: ["<?php echo dirname($_SERVER["PHP_SELF"]); ?>/css/style.css", "<?php echo dirname($_SERVER["PHP_SELF"]); ?>/css/all.min.css"],
                        body_id: "obsah",
                        plugins:["code", "responsivefilemanager", "image", "anchor", "autolink", "autoresize", "link", "media", "lists"],
                        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                        external_plugins: {
                            'responsivefilemanager': '<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
                        },
                        external_filemanager_path: "<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/filemanager/",
                        filemanager_title: "File manager"
                    });
                </script>
		<?php

		}
	} else {
		if (isset($chybaPrihlaseni)) {
			echo $chybaPrihlaseni;
		}
		?>
		<form action="" method="post">
			<label for="">Přihlašovací jméno:</label>
			<input type="text" name="jmeno" id="">
			<label for="">Prihlašovací heslo:</label>
			<input type="password" name="heslo" id="">
			<input type="submit" name="login-submit" value="Přihlásit se">
		</form>




	<?php
	}


	?>




</body>

</html>