<?php

namespace App\Back\Controllers;

use Core\Controller;
use Core\Auth;

final class HomeController extends Controller
{
	public function index(): void
	{
		$this->view('home/index', ['userName' => Auth::user()->name]);
	}
}
