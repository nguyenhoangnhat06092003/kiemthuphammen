<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest1 extends TestCase
{
    
     
     public function testLoginSuccess() {
        $users = [
            'user1' => 'password1',
            'user2' => 'password2',
        ];

        $auth = new Auth($users);
        $result = $auth->login('user1', 'password1');

        $this->assertTrue($result);
    }

    public function testLoginFailure() {
        $users = [
            'user1' => 'password1',
            'user2' => 'password2',
        ];

        $auth = new Auth($users);
        $result = $auth->login('user1', 'wrongpassword');

        $this->assertFalse($result);
    }

    public function testLoginUserNotFound() {
        $users = [
            'user1' => 'password1',
            'user2' => 'password2',
        ];

        $auth = new Auth($users);
        $result = $auth->login('nonexistentuser', 'password1');

        $this->assertFalse($result);
    }
}
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    

