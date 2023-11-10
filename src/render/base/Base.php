<?php

namespace touiteur\render\base;

use touiteur\render\base\footer\FooterClassique;
use touiteur\render\base\header\Header;
use touiteur\render\base\main\Main;

class Base implements Renderable
{
	private Header $header;
	private Main $main;
	private FooterClassique $footer;

	/**
	 * @param Header $header
	 * @param Main $main
	 * @param FooterClassique $footer
	 */
	public function __construct(Header $header, Main $main, FooterClassique $footer)
	{
		$this->header = $header;
		$this->main = $main;
		$this->footer = $footer;
	}

	function render(): string
	{
		$header = $this->header->render();
		$main = $this->main->render();
		$footer = $this->footer->render();
		// TODO id modifie
		return <<<HTML
<article id="setid">
	{$header}
	{$main}
	{$footer}
</article>
HTML;
	}
}