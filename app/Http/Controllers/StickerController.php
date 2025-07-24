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
                    $editBtn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn" style="margin-left: 5px;">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.stickers.list');
    }
}
