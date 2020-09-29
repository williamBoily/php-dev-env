<?php

namespace App\Controller;

use App\Domain\Client\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevController extends AbstractController
{
	/**
	 * @Route("/phpinfo")
	 */
	public function print_phpinfo(): Response
	{
		return new Response(
			phpinfo()
		);
	}

	/**
	 * @Route("/client/insert")
	 */
	public function insert(Request $request): Response
	{
		$client_repository = new \App\Infrastructure\Storage\Redis\ClientRepository();
		$client = new Client($request->get('firstname'), $request->get('lastname'), $request->get('description'));
		$client_repository->insert($client);
		return new Response(
			"first name: {$request->get('firstname')}\n"
			. "last name: {$request->get('lastname')}"
			. "description: {$request->get('description')}"
		);
	}

	/**
	 * @Route("/client/{id}")
	 */
	public function getOne($id): Response
	{
		$client_repository = new \App\Infrastructure\Storage\Redis\ClientRepository();
		$client = $client_repository->findByID($id);
		return new Response(
			var_dump($client)
		);
	}
}

