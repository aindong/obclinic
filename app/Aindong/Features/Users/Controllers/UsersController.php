<?php

namespace Aindong\Features\Users\Controllers;

use Aindong\Features\Users\Repositories\UserInterface;

class UsersController extends \BaseController {

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user) {
        $this->user = $user;
    }

    public function index()
    {
        $roles = \Role::all();

        return \View::make('maintenance.users.index')
            ->with('roles', $roles);
    }
}