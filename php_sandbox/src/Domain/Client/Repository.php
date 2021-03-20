<?php

namespace App\Domain\Client;

interface Repository
{
	public function insert(Client $client);
	public function findByID(int $id);
}
