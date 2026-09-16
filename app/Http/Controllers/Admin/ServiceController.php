<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Service listing.
     */
    public function index(Request $request)
    {
        $query = Service::with('category')
            ->orderBy('id', 'desc');

        /**
         * Search by category.
         */
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        /**
         * Search by service name.
         */
        if ($request->filled('service_name')) {
            $query->where(
                'name',
                'LIKE',
                '%' . $request->service_name . '%'
            );
        }

        $services = $query
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name', 'asc')->get();

        return view(
            'admin.services.index',
            compact(
                'services',
                'categories'
            )
        );
    }

    /**
     * Add service form.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $service = null;

        return view(
            'admin.services.add-edit',
            compact(
                'categories',
                'service'
            )
        );
    }

    /**
     * Store service.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

            'meta_tittle' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'head' => 'nullable|string',
            'body' => 'nullable|string',
            'short_description' => 'nullable|string',
            'brief_description' => 'nullable|string',
        ], [
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category is invalid.',

            'name.required' => 'Service name is required.',
            'name.max' => 'Service name may not be greater than 255 characters.',

            'image.image' => 'Please select a valid image.',
            'image.mimes' => 'Image must be JPG, JPEG, PNG, WEBP or GIF.',
            'image.max' => 'Image size may not be greater than 2 MB.',
        ]);

        try {

            $service = new Service();

            $service->category_id = $request->category_id;
            $service->name = $request->name;

            /**
             * Generate slug automatically.
             */
            $service->slugname = Str::slug($request->name);

            $service->meta_tittle = $request->meta_tittle;
            $service->meta_description = $request->meta_description;
            $service->head = $request->head;
            $service->body = $request->body;
            $service->short_description = $request->short_description;
            $service->brief_description = $request->brief_description;

            /**
             * Image upload.
             */
            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName =
                    time() .
                    '_' .
                    Str::random(6) .
                    '.' .
                    $image->getClientOriginalExtension();

                $destinationPath = public_path('services');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory(
                        $destinationPath,
                        0755,
                        true
                    );
                }

                $image->move(
                    $destinationPath,
                    $imageName
                );

                $service->image = $imageName;
            }

            $service->save();

            return redirect()
                ->route('admin.services.index')
                ->with(
                    'success',
                    'Service added successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' .
                        $e->getMessage()
                );
        }
    }

    /**
     * Edit service.
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)
            ->firstOrFail();

        $categories = Category::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.services.add-edit',
            compact(
                'service',
                'categories'
            )
        );
    }

    /**
     * Update service.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

            'meta_tittle' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'head' => 'nullable|string',
            'body' => 'nullable|string',
            'short_description' => 'nullable|string',
            'brief_description' => 'nullable|string',
        ], [
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category is invalid.',

            'name.required' => 'Service name is required.',
            'name.max' => 'Service name may not be greater than 255 characters.',

            'image.image' => 'Please select a valid image.',
            'image.mimes' => 'Image must be JPG, JPEG, PNG, WEBP or GIF.',
            'image.max' => 'Image size may not be greater than 2 MB.',
        ]);

        try {

            $service = Service::where('id', $id)
                ->firstOrFail();

            $service->category_id = $request->category_id;
            $service->name = $request->name;

            /**
             * Regenerate slug from name.
             */
            $service->slugname = Str::slug(
                $request->name
            );

            $service->meta_tittle = $request->meta_tittle;
            $service->meta_description = $request->meta_description;
            $service->head = $request->head;
            $service->body = $request->body;
            $service->short_description = $request->short_description;
            $service->brief_description = $request->brief_description;

            /**
             * Replace image.
             */
            if ($request->hasFile('image')) {

                /**
                 * Remove old image.
                 */
                if (!empty($service->image)) {

                    $oldImagePath = public_path(
                        'services/' . $service->image
                    );

                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $image = $request->file('image');

                $imageName =
                    time() .
                    '_' .
                    Str::random(6) .
                    '.' .
                    $image->getClientOriginalExtension();

                $destinationPath = public_path('services');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory(
                        $destinationPath,
                        0755,
                        true
                    );
                }

                $image->move(
                    $destinationPath,
                    $imageName
                );

                $service->image = $imageName;
            }

            $service->save();

            return redirect()
                ->route('admin.services.index')
                ->with(
                    'success',
                    'Service updated successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' .
                        $e->getMessage()
                );
        }
    }

    /**
     * Single hard delete.
     */
    public function destroy($id)
    {
        try {

            $service = Service::where('id', $id)
                ->firstOrFail();

            /**
             * Delete image.
             */
            if (!empty($service->image)) {

                $imagePath = public_path(
                    'services/' . $service->image
                );

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $service->delete();

            return response()->json([
                'status' => true,
                'message' => 'Service deleted successfully.',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete service.',
            ], 500);
        }
    }

    /**
     * Bulk hard delete.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer',
        ]);

        try {

            $services = Service::whereIn(
                'id',
                $request->ids
            )->get();

            foreach ($services as $service) {

                /**
                 * Delete image.
                 */
                if (!empty($service->image)) {

                    $imagePath = public_path(
                        'services/' . $service->image
                    );

                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }

                $service->delete();
            }

            return response()->json([
                'status' => true,
                'message' => 'Selected services deleted successfully.',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete selected services.',
            ], 500);
        }
    }
}
