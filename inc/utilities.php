<?php

	function createLink($arr, $defaultTitle) {
		echo '<a href="' . $arr['url'] . '" target="' . $arr['target'] . '">';
		echo ($arr['title']) ? $arr['title'] : $defaultTitle;
		echo '</a>';
	}

	function createIcon($icon, $class = 'clubitsolutions__icon') {

		if ( is_array($class) && sizeof($class) > 1)
			$class = implode(' ', $class);

		echo "<svg class=\"$class\">
						<use xlink:href=\"". get_stylesheet_directory_uri()."/img/sprite.svg#$icon\">
						</use>
					</svg>
		";
	}
