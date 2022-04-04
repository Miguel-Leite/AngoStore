<?php

use Illuminate\Support\Facades\DB;

function authUser()
{
	$person_id = auth()->user()->persons_id;
	$user = DB::select("SELECT users.login, persons.person, persons.email, persons.phone, persons.id FROM persons INNER JOIN users ON users.persons_id=$person_id LIMIT 1;");

	return $user[0];
}