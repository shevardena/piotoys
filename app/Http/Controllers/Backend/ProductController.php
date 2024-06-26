<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ImportProductImagesRequest;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ToyPurchaseRepository;
use App\Services\Backend\ProductService;
use App\Tables\Products;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected ToyPurchaseRepository $toyPurchaseRepository;
    protected CategoryRepository $categoryRepository;

    public function __construct(ProductService $productService, ToyPurchaseRepository $toyPurchaseRepository, CategoryRepository $categoryRepository)
    {
        $this->productService = $productService;
        $this->toyPurchaseRepository = $toyPurchaseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Product list page
     * @return \Illuminate\Foundation\Application|View|Factory|Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.product.index', [
            'products' => Products::class,
        ]);
    }

    /**
     * Store product
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $this->productService->create($request);
            Toast::title('Product created successfully')
                ->autoDismiss(5);
            return redirect()->route('products.index');
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error creating product: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Create product page
     */
    public function create()
    {
        return view('backend.pages.product.create',[
            'toy_purchases' => $this->toyPurchaseRepository->getAll(),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    /**
     * Product edit page
     * @param Product $product
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Product $product): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $product->image = ExistingFile::fromMediaLibrary($product->getMedia('image'));
        $product->images = ExistingFile::fromMediaLibrary($product->getMedia('images'));
        return view('backend.pages.product.edit', [
            'product' => $product,
            'toy_purchases' => $this->toyPurchaseRepository->getAll(),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    /**
     * Update product
     * @param UpdateProductRequest $request
     * @param int $product
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateProductRequest $request, int $product): RedirectResponse
    {
        try {
            $this->productService->update($product, $request);
            Toast::title('Product updated successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error updating product: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }


    /**
     * Delete product
     * @param int $product
     * @return RedirectResponse
     */
    public function destroy(int $product): RedirectResponse
    {
        try {
            $this->productService->destroy($product);
            Toast::title('Product deleted')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error deleting product: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Import product images
     */
    public function importImages()
    {
        return view('backend.pages.product.import_images');
    }

    /**
     * Store products from images
     * @param ImportProductImagesRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function storeFromImages(ImportProductImagesRequest $request): RedirectResponse
    {
        try {
            $this->productService->importProductImages($request);
            Toast::title('Product images imported successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error while import product images: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
