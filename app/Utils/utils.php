<?php

use Illuminate\Support\Facades\DB;

function authUser()
{
	$person_id = auth()->user()->persons_id;
	$user = DB::select("SELECT users.login, persons.person, persons.email, persons.phone, persons.id FROM users, persons WHERE persons.id=users.persons_id AND persons_id=$person_id; ");

	return $user[0];
}

function formatPrice (float $price)
{
	return number_format($price, 2, ",", ".");
}

function lastPrice (float $price)
{
	$lastPrice = 34000.00;
	$price = ceil($price + $lastPrice);
	return number_format($price, 2, ",", ".");
}