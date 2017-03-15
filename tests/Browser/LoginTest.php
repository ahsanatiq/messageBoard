<?php

namespace Tests\Browser;

use App\Role;
use App\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
//    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_all()
    {
        $this->browse(function ($browser) {
            $this->home_test($browser);
            $this->invalid_login_test($browser);
            $this->valid_login_test($browser);
            $this->manage_users_test($browser);
            $this->add_user_test($browser);
            $this->logout_test($browser);
        });
    }

    public function home_test($browser) {
        return $browser
            ->visit('/')
            ->assertSee('Login');
    }

    public function invalid_login_test($browser) {
        return $browser
            ->visit('/login')
            ->type('email','wrong@email.com')
            ->type('password', 'pass')
            ->press('Log In')
            ->waitForText('credentials do not match','15');
    }

    public function valid_login_test($browser) {
        return $browser
            ->visit('/login')
            ->type('email', 'superadmin@abc.com')
            ->type('password', 'superadmin')
            ->press('Log In')
            ->assertPathIs('/home');
    }

    public function manage_users_test($browser) {
        return $browser
            ->visit('/')
            ->click('#user-menu')
            ->assertSee('Manage Users')
            ->click('#nav-bar-manage-users')
            ->assertPathIs('/users')
            ->assertSee('Manage Users')
            ->assertSee('superadmin@abc.com')
            ->assertSee('Super Admin')
            ->assertVisible('#edit-user-1')
            ->assertMissing('#delete-user-1');
    }

    public function add_user_test($browser) {
        $user = factory(User::class)->make();
        return $browser
            ->visit('/users')
            ->assertSee('Add User')
            ->click('#add-user-link')
            ->assertSee('Create User')
            ->type('name',$user->name)
            ->type('email',$user->email)
            ->type('phone',$user->phone)
            ->type('website',$user->website)
            ->select('country',$user->country)
            ->type('region',$user->region)
            ->type('district',$user->district)
            ->type('city',$user->city)
            ->type('address',$user->address)
            ->select('object_type',$user->object_type)
            ->select('role_id',$user->role_id)
            ->press('Submit')
            ->assertPathIs('/users')
            ->assertSee('User successfully created')
            ->assertSee($user->name)
            ->assertSee($user->email)
            ->assertSee(Role::find($user->role_id)->name)
            ->assertVisible('#edit-user-2')
            ->assertVisible('#delete-user-2');

    }

    public function logout_test($browser) {
        return $browser
            ->visit('/')
            ->click('#user-menu')
            ->assertSee('Logout')
            ->click('#nav-bar-logout');
    }
}
