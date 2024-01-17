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
    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->query('filter');
        $paginate = (int) ($request->query('paginate') ?? 5);
        
        $query = Product::query();
        if (!is_null($filters)) {
            if (array_key_exists('categories', $filters)) {
                $query = $query->whereIn('category_id', $filters['categories']);
            }
            if (!is_null($filters['price_min'])) {
                $query = $query->where('price', '>=', $filters['price_min']);
            }
            if (!is_null($filters['price_max'])) {
                $query = $query->where('price','<=', $filters['price_max']);
            }

            return response()->json($query->paginate($paginate));
        }

        return view("welcome",  [
            "products" => $query->paginate($paginate),
            "categories" => ProductCategory::orderBy('name', 'ASC')->get(),
            "defaultImage" => 'https://via.placeholder.com/240x240/5fa9f8/efefef'
        ]);
    }
}
