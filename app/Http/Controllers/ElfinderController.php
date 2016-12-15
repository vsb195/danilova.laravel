<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElfinderController extends Controller
{
    public function connector() {
		require 'Elfinder/ElfinderConnector.php';
	}

}
