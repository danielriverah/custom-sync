<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitFtpController extends Controller
{
    /**
     * Display the Git-FTP service page.
     */
    public function index()
    {
        return view('gitftp');
    }
}
