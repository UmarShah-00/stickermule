<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
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
            'name' => 'required',
            'type' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('stickers', 'public');
        }
        Sticker::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Sticker saved!');
    }

    public function stickerlist(Request $request)
    {
        if ($request->ajax()) {
            $data = Sticker::latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                   $editBtn = '<a href="' . route('sticker.edit', $row->id) . '" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $deleteBtn = '<a href=" ' .$row->id . ' " data-id="' . $row->id . '" class="delete btn btn-danger btn-sm" style="margin-left: 5px; ">Delete</a>';
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
        'name' => 'required',
        'type' => 'required',
        'description' => 'nullable',
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

}
