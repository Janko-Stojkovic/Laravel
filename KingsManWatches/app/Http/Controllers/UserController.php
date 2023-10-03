<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    private $userModel;
    private $roleModel;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
        $this->roleModel = new Role();
    }

    public function index() {
        $this->data['users'] = $this->userModel->get();

        return view('pages.admin.users.index', $this->data);
    }

    public function create()
    {
        $this->data['roles'] = $this->roleModel->get();
        $this->data['pages'] = [
            [
                "name" => "Users",
                "route"=> "admin.users.index"
            ],
            [
                "name" => "Add new user"
            ]
        ];

        return view('pages.admin.users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $this->userModel->insert(
                $request->get('username'),
                $request->get('email'),
                $request->get('password'),
                $request->get('role')
            );

            $this->logAction("Admin created the " . $request->get('username') . " user.", $request);
            return redirect()->route('admin.users.index')->with('messages', ['User ' . $request->get('username') . ' was created successfully.']);
        } catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", "Error ID: " . $uniqueId]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->data['user'] = $this->userModel->find($id);
        $this->data['roles'] = $this->roleModel->get();
        $this->data['pages'] = [
            [
                "name" => "Users",
                "route"=> "admin.users.index"
            ],
            [
                "name" => "Edit user"
            ]
        ];

        return view('pages.admin.users.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userModel->myUpdate(
                $id,
                $request->get('username'),
                $request->get('email'),
                $request->get('password'),
                $request->get('role')
            );

            $this->logAction("Admin updated the " . $request->get('username') . " user.", $request);
            if(session()->get('user')->id == $id)
                session()->remove('user');

            return redirect()->route('admin.users.index')->with('messages', ['User was updated successfully.']);
        } catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", "Error ID: " . $uniqueId]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

            $this->userModel->myDelete($id);

            $this->logAction("Admin deleted a user.", request());

            if(session()->get('user')->id == $id)
                session()->remove('user');

            return redirect()->route('admin.users.index')->with('messages', ['User was deleted successfully.']);

    }
}
