<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("welcome",  [
            "products" => Product::paginate(10),
            "categories" => ProductCategory::orderBy('name', 'ASC')->get()
        ]);
    }
 
}
