<?php

namespace Aindong\Features\Users\Controllers\Api;

use Aindong\Features\Users\Repositories\UserInterface;
use Carbon\Carbon;

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
        $allergies = $this->user->all();

        $result = ['data' => []];

        foreach ($allergies as $user) {
            $result['data'][] = [
                'username'        => $user->username,
                'name'      => $user->firstname . ' ' . $user->lastname,
                'role'      => $user->role->name,
                'created'   => Carbon::createFromTimestamp(strtotime($user->created_at))->format('M d, Y'),
                'updated'   => Carbon::createFromTimestamp(strtotime($user->updated_at))->format('M d, Y'),
                'actions'   => '<div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        Actions <i class="fa fa-caret-down text-default-light"></i>
                                    </button><div class="dropdown-backdrop"></div>

                                    <ul class="dropdown-menu animation-expand" role="menu">
                                        <li><a href="#">Update</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="fa fa-fw fa-times text-danger"></i> Remove item</a></li>
                                    </ul>
                                </div>'
            ];
        }

        return \Response::json($result, 200);
    }

    public function store()
    {
        $data = \Input::all();

        $user = $this->user->create($data);

        $status = 'failed';
        if ($user['status'] != 'failed') {
            $status = 'success';
        }

        $result = ['status' => $status, 'data' => $user];

        return \Response::json($result, 200);
    }

    public function update($id)
    {
        $data = \Input::all();

        $item = $this->user->update($id, $data);

        if ($item) {
            $result = ['status' => 'success', 'data' => $item];
        } else {
            $result = ['status' => 'failed', 'data' => $item];
        }

        return \Response::json($result);
    }

    public function destroy($id)
    {
        $status = $this->user->delete($id);

        if ($status) {
            return \Response::json(['status' => 'success'], 200);
        }

        return \Response::json(['status' => 'failed'], 400);
    }

    public function roles()
    {
        $roles = \Role::all();

        return \Response::json($roles, 200);
    }
}