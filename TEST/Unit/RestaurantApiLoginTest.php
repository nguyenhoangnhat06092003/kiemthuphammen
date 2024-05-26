<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RestaurantApiLoginTest extends TestCase {
    private $base_url = "http://example.com"; // Base URL of your API
    private $valid_credentials = array(
        'username' => 'testuser',
        'password' => 'testpassword'
    );

    public function testValidLogin() {
        $url = $this->base_url . "/../resources/views/auth/login.blade.php";

        // Make a POST request to the /login endpoint with valid credentials
        $response = $this->makeRequest($url, 'POST', $this->valid_credentials);

        // Check if response is not false (i.e., request was successful)
        $this->assertNotFalse($response);

        // Decode the JSON response
        $result = json_decode($response, true);

        // Check if login was successful (assuming API returns a token upon successful login)
        $this->assertArrayHasKey('token', $result);
    }

    public function testInvalidLogin() {
        $url = $this->base_url . "/../resources/views/auth/login.blade.php";

        // Make a POST request to the /login endpoint with invalid credentials
        $invalid_credentials = array(
            'username' => 'invaliduser',
            'password' => 'invalidpassword'
        );
        $response = $this->makeRequest($url, 'POST', $invalid_credentials);

        // Check if response is not false (i.e., request was successful)
        $this->assertNotFalse($response);

        // Decode the JSON response
        $result = json_decode($response, true);

        // Check if login was unsuccessful (assuming API returns an error message upon failed login)
        $this->assertArrayHasKey('error', $result);
    }

    // Helper function to make API requests
    private function makeRequest($url, $method, $data = array()) {
        $options = array(
            'http' => array(
                'method' => $method,
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}
     * @return void
     
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    

