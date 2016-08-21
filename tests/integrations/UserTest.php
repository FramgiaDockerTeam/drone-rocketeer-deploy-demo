<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_an_user()
    {
        factory(User::class)->create([
            'name' => 'ThangTD',
            'email' => 'test@gmail.com',
        ]);
         $this->seeInDatabase('users', ['email' => 'test@gmail.com']);
    }

    /** @test */
    public function it_validates_an_invalid_email()
    {
        $this->visit('register')
            ->type('ThangTD', 'name')
            ->type('test', 'email')
            ->type('12345678', 'password')
            ->type('12345678', 'password_confirmation')
            ->press('Register')
            ->seePageIs('register');
    }

    /** @test */
    public function it_validates_password_confirmation()
    {
        $this->visit('register')
            ->type('ThangTD', 'name')
            ->type('test@gmail.com', 'email')
            ->type('mismatch', 'password')
            ->type('mismatck', 'password_confirmation')
            ->press('Register')
            ->seePageIs('register')
            ->see('The password confirmation does not match');
    }

    /** @test */
    public function it_registers_an_user()
    {
        $this->visit('register')
            ->type('ThangTD', 'name')
            ->type('test@gmail.com', 'email')
            ->type('validpassword', 'password')
            ->type('validpassword', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/')
            ->see('ThangTD');
    }

    /** @test */
    public function it_authenticates_user()
    {
        $user = factory(User::class)->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $this->visit('/login')
            ->type('test@gmail.com', 'email')
            ->type('wrong_password', 'password')
            ->press('Login')
            ->see('These credentials do not match our records');

        $this->visit('/login')
            ->type('test@gmail.com', 'email')
            ->type('12345678', 'password')
            ->press('Login')
            ->see($user->name);
    }

}