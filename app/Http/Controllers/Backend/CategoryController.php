<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Backend\CategoryService;
use App\Tables\Categories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Category list page
     * @return \Illuminate\Foundation\Application|View|Factory|Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.category.index', [
            'categories' => Categories::class,
        ]);
    }

    /**
     * Store category
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            $this->categoryService->create($request->validated());
            Toast::title('Category created successfully')
                ->autoDismiss(5);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error creating category: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Create category page
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Category edit page
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Category $category): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update category
     * @param UpdateCategoryRequest $request
     * @param int $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(UpdateCategoryRequest $request, int $category): RedirectResponse
    {
        try {
            $this->categoryService->update($category, $request->validated());
            Toast::title('Category updated successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error updating category: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }


    /**
     * Delete category
     * @param int $category
     * @return RedirectResponse
     */
    public function destroy(int $category): RedirectResponse
    {
        try {
            $this->categoryService->destroy($category);
            Toast::title('Category deleted')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error deleting category: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
