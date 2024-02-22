<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ads;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Division;
use App\Models\Products;
use Termwind\Components\Raw;
use App\Models\Feature_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Newproducts = Products::with([
        //     'overviews',
        //     'product_infos',
        //     'product_images',
        //     'product_extras',
        //     'tags',
        //     'sizes',
        //     'colors',
        //     'brand',
        //     'category',
        //     'subcategory',
        //     'product_price'
        // ])->latest('created_at')->take(8)->get();

        // echo '<pre>';
        // print_r($products);

        function getChildren($categoryName) {
            $children = Category::where('parent_category', $categoryName)->get();
            foreach ($children as $child) {
                $child->children = getChildren($child->category_name);
            }
            return $children;
        }

        $parentCategories = Category::where('parent_category')->get();
        $groupedCategories = [];
        foreach ($parentCategories as $parentCategory) {
            $groupedCategories[$parentCategory->category_name] = getChildren($parentCategory->category_name);
        }

        $categories = Category::with('children')->whereNull('parent_category')->get();
        $cat_feature = Feature_category::where('status', 'Active')->first();
        $sliders = Slider::all();
        $adsbanner = Ads::all();
        $campaign = Campaign::where('status','Published')->first();

        return view('frontend.home.index',compact('categories','groupedCategories','cat_feature','sliders','adsbanner','campaign'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function aboutus()
    {
        return view('frontend.about-us');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contactus()
    {
        return view('frontend.contact-us');
    }


    public function checkout()
    {
        $divisions = Division::all();
        return view('frontend.checkout');
    }


    /**
     * Display the specified resource.
     */
    public function products(string $slug)
    {
        $product = Products::with([
            'overviews',
            'product_infos',
            'product_images',
            'product_extras',
            'tags',
            'sizes',
            'colors',
            'brand',
            'category',
            'subcategory',
            'product_price',
            'product_thumbnail',
        ])->where('slug', $slug)->first();

        $realatedProducts = Products::with([
            'overviews',
            'product_infos',
            'product_images',
            'product_extras',
            'tags',
            'sizes',
            'colors',
            'brand',
            'category',
            'subcategory',
            'product_price',
            'product_thumbnail'
        ])->where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();

        $campaign = Campaign::where('status','Published')->first();
        $adsbanner = Ads::all();


        return view('frontend.product-details',compact('product','realatedProducts','campaign','adsbanner'));

        // return response()->json($products, 200, [], JSON_PRETTY_PRINT);

    }

    public function wishlist(){
        return view('frontend.shop-wishlist');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function quickview(Request $request)
    {
        $slug = $request->slug;

        $product = Products::with([
            'overviews',
            'product_infos',
            'product_images',
            'product_thumbnail',
            'product_extras',
            'tags',
            'sizes',
            'colors',
            'brand',
            'category',
            'subcategory',
            'product_price'
        ])->where('slug', $slug)->first();

        return response()->json( $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function searchBar(Request $request)
    {
        $searchTerm = $request->input('qwrd');

        // Query the products table to find matching products along with their images
        $products = Products::where('product_name', 'like', '%' . $searchTerm . '%')
                            ->orWhere('sku', 'like', '%' . $searchTerm . '%')
                            ->orWhere('regular_price', 'like', '%' . $searchTerm . '%')
                            ->with('product_images') // Eager load product images
                            ->limit(5) // Limit the number of results
                            ->get();

        // Prepare the response data
        $response = [];
        foreach ($products as $product) {
            $response[] = [
                'product_name' => $product->product_name,
                'sku' => $product->sku,
                'regular_price' => $product->regular_price,
                'image_url' => asset('storage/product_images/' . $product->product_images->first()->product_image), // Assuming product_images is a relation and product_image is the image field
                // Add more fields as needed
            ];
        }

        // Return the response as JSON
        return response()->json(['products' => $response]);
    }

}
