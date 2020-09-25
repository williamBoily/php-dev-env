<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevController
{
	/**
	 * @Route("/phpinfo")
	 */
	public function print_phpinfo(): Response
	{
		$number = random_int(0, 100);

		return new Response(
			phpinfo()
		);
	}
}

