<?php

namespace App\Infrastructure\Storage\Redis;

use App\Domain\Client\Client;

class ClientRepository implements \App\Domain\Client\Repository
{
	const KEY = 'client:';
	private $redis;
	public function __construct()
	{
		$this->redis = new \Redis();
		$this->redis->connect('redis', 6379);
	}

	public function insert(Client $client)
	{
		$new_client_id = $this->redis->incr('clientID');
		$this->redis->hMSet(
			self::KEY . $new_client_id,
			[
				'firstname' => $client->first_name,
				'lastname' => $client->last_name,
				'description' => $client->description
			]
		);
	}

	public function findByID(int $id){
		return $this->redis->hGetAll(self::KEY . $id);
	}

	
}
