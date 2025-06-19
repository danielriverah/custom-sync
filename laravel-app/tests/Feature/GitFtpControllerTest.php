<?php

namespace Tests\Feature;

use Tests\TestCase;

class GitFtpControllerTest extends TestCase
{
    /** @test */
    public function git_ftp_route_is_accessible(): void
    {
        $response = $this->get('/git-ftp');

        $response->assertStatus(200);
        $response->assertSee('Servicio Git-FTP');
    }
}
