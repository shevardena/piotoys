<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Backend\BackendCategoryService;
use App\Tables\Categories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class BackendCategoryController extends Controller
{
    protected BackendCategoryService $categoryService;
    protected CategoryRepository $categoryRepository;

    public function __construct(BackendCategoryService $categoryService, CategoryRepository $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
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
     * @param int $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(int $category): \Illuminate\Foundation\Application|View|Factory|Application
    {
        dd($this->categoryRepository->find($category));
        return view('backend.pages.category.edit', [
            'category' => $this->categoryRepository->find($category)
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
