<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.category_view', compact('categories'));
    }

    public function create()
    {
        return view('category.category_add');
    }

    public function store(Request $request)
    {
        
        if ($request->hasFile('photo')) {
            $file = request()->file('photo');
            $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
            Storage::disk('public')->put($imageName, File::get($file));

            Category::create([
                'category_name' => $request->category_name,
                'photo' => $imageName,
            ]);

            return redirect()->back();
        }
    }

    public function destroy($id)
    {

        if ($id) {
            $category = Category::findOrFail($id);

            if ($category) {
                //unlink($category->photo);
                Storage::disk('public')->delete($category->photo);
            }
            Category::findOrFail($id)->delete();
           
            return redirect()->back();
        }
    }
}
