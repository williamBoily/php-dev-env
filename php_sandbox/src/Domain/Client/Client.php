<?php

namespace App\Domain\Client;

class Client
{

	// public for simplicity
	public $first_name;
	public $last_name;
	public $description;

	public function __construct(string $first_name, string $last_name, string $description = "")
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->description = $description;
	}

	
}
