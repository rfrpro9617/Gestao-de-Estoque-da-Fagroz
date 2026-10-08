<?php
namespace App\Back\Controllers;

use Core\Controller;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', ['title' => 'Boilerplate PHP MVC']);
    }
}
