<?php

function menu_active($menu_item = null, $active_page = null)
{
	if ($menu_item && $active_page) {
		if ($menu_item == $active_page) {
			echo 'active';
		}
	}
}