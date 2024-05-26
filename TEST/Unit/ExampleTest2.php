<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
/* Test Đăng ký */

class ExampleTest2 extends TestCase
{
    
     /*Kiểm tra đăng ký thành công với tên mới */
    public function testRegisterSuccess() {
        $auth = new Auth();
        $result = $auth->register('newuser', 'password123');
        
        $this->assertTrue($result);
        $this->assertArrayHasKey('newuser', $auth->getUsers()); /* Kiểm tra tên người dùng đã được thêm vào bảng user */
    }
/* Kiểm tra đăng kí thất bại khi tên người dùng đã tồn tại */
    public function testRegisterUserAlreadyExists() {
        $users = [
            'existinguser' => 'password123',
        ];

        $auth = new Auth($users);
        $result = $auth->register('existinguser', 'newpassword');
        
        $this->assertFalse($result);
        $this->assertEquals('password123', $auth->getUsers()['existinguser']);
    }

}
     * @return void
     
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    

