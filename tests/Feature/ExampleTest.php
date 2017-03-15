<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
//
//    public function test_home() {
//        return $this->visit('/')
//            ->assertSee('Login');
//    }
//
//    public function test_invalid_login() {
//        return $this
//            ->visit('/login')
//            ->type('email','wrong@email.com')
//            ->type('password', 'pass')
//            ->press('Log In')
//            ->waitForText('credentials do not match','15');
//    }
//
//    public function test_valid_login() {
//        return $this
//            ->visit('/login')
//            ->type('email', 'superadmin@abc.com')
//            ->type('password', 'superadmin')
//            ->press('Log In')
//            ->assertPathIs('/home');
//    }
//
//    public function test_manage_users() {
//        return $this
//            ->visit('/')
//            ->click('#user-menu')
//            ->assertSee('Manage Users')
//            ->click('#nav-bar-manage-users')
//            ->assertPathIs('/users')
//            ->assertSee('Manage Users')
//            ->assertSee('superadmin@abc.com')
//            ->assertSee('Super Admin')
//            ->assertVisible('#edit-user-1')
//            ->assertMissing('#delete-user-1');
//    }
//
//    public function test_add_user() {
//        return $this
//            ->visit('/users')
//            ->assertSee('Add User')
//            ->click('#add-user-link')
//            ->assertSee('Create User')
//            ->type('name','John')
//            ->type('email','john@doe.com')
//            ->type('phone','+11111111111')
//            ->type('website','http://www.john.doe')
//            ->select('country','Pakistan')
//            ->type('region','abc')
//            ->type('district','xyz')
//            ->type('city','Lahore')
//            ->type('address','xxxx-xxx xxxx')
//            ->select('object_type','beta')
//            ->select('role_id','Admin')
//            ->press('Submit')
//            ->assertPathIs('/users')
//            ->assertSee('User successfully created')
//            ->assertSee('John')
//            ->assertSee('john@doe.com')
//            ->assertSee('Admin')
//            ->assertVisible('#edit-user-2')
//            ->assertVisible('#delete-user-2');
//
//    }
//
//    public function test_logout() {
//        return $this
//            ->visit('/')
//            ->click('#user-menu')
//            ->assertSee('Logout')
//            ->click('#nav-bar-logout');
//    }
}
