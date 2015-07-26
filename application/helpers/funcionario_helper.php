<?php

function funcionario_orgao($orgao = '')
{
	$orgao = (string)$orgao;

	if (is_string($orgao) && strlen($orgao) >= 3) {
		return substr($orgao, -3, 3);
	}
	return false;
}

function functionario_estabelecimento($estabelecimento = '')
{
	$estabelecimento = (string)$estabelecimento;

	if (is_string($estabelecimento) && strlen($estabelecimento) >= 3) {
		return str_pad(substr($estabelecimento, -4, 1), 3, '0', STR_PAD_LEFT);
	}
	return false;
}