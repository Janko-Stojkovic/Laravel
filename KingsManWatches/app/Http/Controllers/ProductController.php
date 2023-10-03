<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends ClientController
{
    private $productModel;
    private $brandModel;

    public function __construct()
    {
        parent::__construct();



        $this->productModel = new Product();
        $this->brandModel = new Brand();

        $this->data['brands'] = $this->brandModel->take(true);
    }
    public function index(Request $request){
        try {
            $productModel = new Product();
            $this->data['brands'] = Brand::all();
            $this->data['products'] = $productModel->get($request);
            $this->data['checkedBrands'] = $request->get("brandIds");
            if ($this->data['checkedBrands'] == null){
                $this->data['checkedBrands'] = Product::all()->toArray();
            }
            return view('pages.client.shop',$this->data);
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }

    }

    public function store(StoreProductRequest $request){
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->brandId = $request->brandId;
            $product->price = $request->price;
            $product->description = $request->description;
            $image = $request->hasFile('image');
            $imageHover = $request->hasFile('imageHover');
            if ($image && $imageHover){
                $newImage = $request->file('image')->getClientOriginalName();
                $newImageHover = $request->file('imageHover')->getClientOriginalName();
                $product->image = $newImage;
                $product->imageHover = $newImageHover;
            }
            $product->save();
            $this->logAction("Admin created the " . $request->get('name') . " product.", $request);
            return redirect()->route('admin.products.index')->with('messages', ['Product ' . $request->get('name') . ' was created successfully.']);
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }
    }
    public function create()
    {
        $this->data['nav'] = $this->navModel->getAdminNav();
        $this->data['products'] = $this->productModel->getAll();
        $this->data['pages'] = [
            [
                'name' => 'Products',
                'route' => 'admin.products.index'
            ],
            [
                'name' => 'Add new product'
            ]
        ];

        return view('pages.admin.products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    /* OVAKO BI IZGLEDALA FUNKCIJA ZA PRIKAZ POJEDINACNOG ROIZVODA NA POSEBNOJ STRANI TESTIRAO SAM
        I RADILO JE SAMO NISAM IMAO VREMENA DA STILIZUJEM CELU STRANU ZATO SAM JE I IZBRISAO IZ PROJEKTA JER BIH SAMO IZGUBIO VREME
        NA STILIZOVANJE KOJE NIJE BITINO*/
    public function show($id)
    {
        $Product = $this->productModel->find($id);
        $this->data['product'] = $Product;

        return view("pages.client.show", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->data['nav'] = $this->navModel->getAdminNav();
        $this->data['pages'] = [
            [
                'name' => 'Products',
                'route' => 'admin.products.index'
            ],
            [
                'name' => 'Edit Product'
            ]
        ];
        $this->data['product'] = $this->productModel->find($id);

        return view('pages.admin.products.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->brandId = $request->brandId;
            $product->price = $request->price;
            $product->description = $request->description;
            $image = $request->hasFile('image');
            $imageHover = $request->hasFile('imageHover');
            if ($image && $imageHover){
                $newImage = $request->file('image')->getClientOriginalName();
                $newImageHover = $request->file('imageHover')->getClientOriginalName();
                $product->image = $newImage;
                $product->imageHover = $newImageHover;
            }
            $product->save();
            $this->logAction("Admin updated the " . $request->get('name') . " Product.", $request);
            return redirect()->route('admin.products.index')->with('messages', ['Product was updated successfully.']);
        } catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
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

            $this->productModel->myDelete($id);
            $this->logAction("Admin deleted a product.", request());
            return redirect()->route('admin.products.index')->with('messages', ['Product was deleted successfully.']);
        } catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

}
