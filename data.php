<?php


class Stranka
{
	protected $id;
	protected $titulek;
	protected $menu;
	protected $obrazek;


	function __construct($argId, $argTitulek, $argMenu, $argObrazek)
	{
		$this->id = $argId;
		$this->titulek = $argTitulek;
		$this->menu = $argMenu;
		$this->obrazek = $argObrazek;
	}

	function getTitulek()
	{
		return $this->titulek;
	}

	function getId()
	{
		return $this->id;
	}

	function getMenu()
	{
		return $this->menu;
	}

	function getObrazek()
	{
		return $this->obrazek;
	}

	function getObsah()
	{
		$obsahSouboru = file_get_contents("{$this->id}.html");
		return $obsahSouboru;
	}

	function setObsah($argNovyObsah)
	{
		file_put_contents("{$this->id}.html", $argNovyObsah);
	}
}

$seznamStranek = [
	"domu" => new Stranka("domu", "Homepage", "Domů", "primapenzion-main.jpg"),
	"galerie" => new Stranka("galerie", "Fotky", "Fotogalerie", "primapenzion-pool-min.jpg"),
	"rezervace" => new Stranka("rezervace", "Rezervace", "Chci pokoj", "primapenzion-room.jpg"),
	"kontakt" => new Stranka("kontakt", "Kontakt", "Napište nám", "primapenzion-room2.jpg"),
	"404" => new Stranka("404", "Stránka nenalezena", "", "primapenzion-room.jpg")
];



/*
$seznamStranek = [
	"domu" => [
		"id" => "domu",
		"titulek" => "Homepage",
		"menu" => "Domů",
		"obrazek" => "primapenzion-main.jpg"
	],
	"galerie" => [
		"id" => "galerie",
		"titulek" => "Fotky",
		"menu" => "Fotogalerie",
		"obrazek" => "primapenzion-pool-min.jpg"
	],
	"rezervace" => [
		"id" => "rezervace",
		"titulek" => "Rezervace",
		"menu" => "Chci pokoj",
		"obrazek" => "primapenzion-room.jpg"
	],
	"kontakt" => [
		"id" => "kontakt",
		"titulek" => "Kontakt",
		"menu" => "Napište nám",
		"obrazek" => "primapenzion-room2.jpg"
	],
	"404" => [
		"id" => "404",
		"titulek" => "Stránka nenalezena",
		"menu" => "",
		"obrazek" => "primapenzion-room.jpg"

	]
]; 

*/