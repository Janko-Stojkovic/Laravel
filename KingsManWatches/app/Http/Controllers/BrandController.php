<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends AdminController
{
    private $brandModel;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __construct()
    {
        parent::__construct();
        $this->brandModel = new Brand();
    }

    public function index() {
        $brandModel = new Brand();
        $this->data['brands'] = $brandModel->get();

        return view('pages.admin.brands.index', $this->data);
    }

    public function create()
    {
        $this->data['pages'] = [
            [
                "name" => "Brands",
                "route"=> "admin.brands.index"
            ],
            [
                "name" => "Add new brand"
            ]
        ];

        return view('pages.admin.brands.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            $this->brandModel->insert($request->get('name'), $request->has('listed'));

            $this->logAction("Admin added new brand: " . $request->get('name'), $request);

            return redirect()->route('admin.brands.index')->with('messages', ["Brand " . $request->get('name') . " was added successfully."]);
        } catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
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
        $this->data['brand'] = $this->brandModel->find($id);
        $this->data['pages'] = [
            [
                "name" => "Brands",
                "route"=> "admin.brands.index"
            ],
            [
                "name" => "Edit brand"
            ]
        ];

        return view('pages.admin.brands.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        try {
            $this->brandModel->myUpdate($id, $request->get('name'), $request->has('listed'));

            $this->logAction("Admin updated the " . $request->get('name') . " brand.", $request);

            return redirect()->route('admin.brands.index')->with('messages', ['Brand was changed successfully.']);
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
        try {
            $this->brandModel->myDelete($id);

            $this->logAction("Admin deleted a brand.", request());

            return redirect()->route('admin.brands.index')->with('messages', ["Brand was deleted successfully."]);
        } catch(\Exception $ex) {
            return redirect()->back()->withErrors(["We encountered an error."]);
        }
    }
}
