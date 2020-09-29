<?php

namespace App\Domain\Client;

class Service
{
	public function __construct(/* storage*/)
	{
		
	}

	public function addClient(string $first_name, string $last_name, string $description = "")
	{
		$new_client = new Client($first_name, $last_name, $description);

	}

	public function insertClient(Client $client)
	{
		
	}
}
