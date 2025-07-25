<?php

namespace App\Http\Controllers;

 use App\Models\Sticker;
use App\Models\Size;
use App\Models\Price;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DataTables;

class StickerController extends Controller
{
    public function create()
    {
        return view('pages.stickers.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'background_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        // 'category_name' => 'required|string|max:255',
        'sizes' => 'required|array',
    ]);

    // Save images
    $imagePath = $request->file('image')?->store('stickers', 'public');
    $backgroundImagePath = $request->file('background_image')?->store('backgrounds', 'public');

    // Create or find category
    // $category = Category::firstOrCreate(
    //     ['name' => $request->category_name],
    //     ['slug' => Str::slug($request->category_name)]
    // );

    // Create Sticker
 try {
    $sticker = Sticker::create([
        'name' => $request->name,
        'title' => $request->title,
        'slug' => $request->slug ?? Str::slug($request->name),
        'description' => $request->description,
        'image' => $imagePath,
        'background_image' => $backgroundImagePath,
    ]);

    // Sizes and Prices
    foreach ($request->sizes as $sizeData) {
        $size = $sticker->sizes()->create([
            'width' => $sizeData['width'],
            'height' => $sizeData['height'],
            'label' => $sizeData['label'] ?? null,
        ]);

        foreach ($sizeData['prices'] ?? [] as $priceData) {
            $size->prices()->create([
                'quantity' => $priceData['quantity'],
                'price' => $priceData['price'],
            ]);
        }
    }

    return redirect()->back()->with('success', 'Sticker saved successfully!');
    } catch (\Exception $e) {
        Log::error('Sticker Save Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error saving sticker: ' . $e->getMessage());
    }
}



    public function stickerlist(Request $request)
    {
        if ($request->ajax()) {
            $data = Sticker::latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('sticker.edit', $row->id) . '" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $deleteBtn = '<a href=" ' . $row->id . ' " data-id="' . $row->id . '" class="delete btn btn-danger btn-sm" style="margin-left: 5px; ">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.stickers.list');
    }


    public function edit($id)
    {
        $sticker = Sticker::find($id);
        if (!$sticker) {
            return redirect()->route('stickers.index')->with('error', 'Sticker not found');
        }
        return view('pages.stickers.edit', compact('sticker'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sticker = Sticker::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($sticker->image && \Storage::disk('public')->exists($sticker->image)) {
                \Storage::disk('public')->delete($sticker->image);
            }

            $sticker->image = $request->file('image')->store('stickers', 'public');
        }

        $sticker->name = $request->name;
        $sticker->type = $request->type;
        $sticker->description = $request->description;
        $sticker->save();

        return redirect()->route('sticker.list')->with('success', 'Sticker updated successfully!');
    }


    public function destroy($id)
    {
        $record = Sticker::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }


    //Categories
    public function categorylist()
    {
        return view('pages.categories.list');
    }
}
