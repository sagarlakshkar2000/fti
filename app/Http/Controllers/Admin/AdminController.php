<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $offers = Offer::latest()->paginate(10);
        return view('admin.dashboard', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'link' => 'nullable|url',
            'discount' => 'nullable|integer',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/offers'), $imageName);
            $data['image'] = '/assets/offers/' . $imageName;
        }

        Offer::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Offer created successfully.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.form', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'link' => 'nullable|url',
            'discount' => 'nullable|integer',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (file_exists(public_path($offer->image))) {
                unlink(public_path($offer->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/offers'), $imageName);
            $data['image'] = '/assets/offers/' . $imageName;
        }

        $offer->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        if ($offer->image && file_exists(public_path($offer->image))) {
            unlink(public_path($offer->image));
        }
        $offer->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Offer deleted successfully.');
    }
}
