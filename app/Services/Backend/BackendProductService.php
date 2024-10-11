<?php

namespace App\Services\Backend;

use App\Http\Requests\Backend\ImportProductImagesRequest;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use ProtoneMedia\Splade\FileUploads\SpladeFile;

class BackendProductService
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Store product
     * @param StoreProductRequest $request
     * @throws \Exception
     */
    public function create(StoreProductRequest $request): void
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->create($request->validated());
            $this->syncProductImages($request, $product);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * Update product
     * @param int $id
     * @param UpdateProductRequest $request
     * @return void
     * @throws \Exception
     */
    public function update(int $id, UpdateProductRequest $request): void
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->update($id, $request->validated());
            $this->syncProductImages($request, $product);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * Delete product
     * @param int $product
     * @throws \Exception
     */
    public function destroy(int $product)
    {
        DB::beginTransaction();
        try {
            $this->productRepository->delete($product);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }


    /**
     * Store product from images
     * @param ImportProductImagesRequest $request
     * @throws \Exception
     */
    public function importProductImages(ImportProductImagesRequest $request): void
    {
        DB::beginTransaction();
        try {
            $request->orderedSpladeFileUploads('images')->each(function (SpladeFile $file) {

                $fileName = pathinfo($file->upload->getClientOriginalName(), PATHINFO_FILENAME);

                $product = $this->productRepository->create([
                    'name' => $fileName,
                ]);

                $filePath = $file->file->getPathname();
                $product->addMedia($filePath)->toMediaCollection('image');
            });
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function syncProductImages($request, Product $product): void
    {
        HandleSpladeFileUploads::syncMediaLibrary($request, $product, 'image', 'image');
        HandleSpladeFileUploads::syncMediaLibrary($request, $product, 'images', 'images');
        HandleSpladeFileUploads::syncMediaLibrary($request, $product, 'og_image', 'og_image');
    }

}
