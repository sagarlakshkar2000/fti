@extends('layouts.admin')

@section('title', isset($offer) ? 'Edit Offer' : 'Create New Offer')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
    <form action="{{ isset($offer) ? route('admin.offers.update', $offer) : route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($offer))
        @method('PUT')
        @endif

        <div class="space-y-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Offer Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $offer->title ?? '') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">{{ old('description', $offer->description ?? '') }}</textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Offer Image</label>
                <div class="mt-1 flex items-center space-x-5">
                    @if(isset($offer) && $offer->image)
                    <img src="{{ $offer->image }}" alt="Current Image" class="h-20 w-20 object-cover rounded shadow">
                    @endif
                    <input type="file" name="image" id="image" accept="image/*" {{ isset($offer) ? '' : 'required' }}
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <p class="mt-2 text-xs text-gray-500">Recommended size: 1280x853 or 853x1280. Max 5MB.</p>
            </div>

            <!-- Grid for Price/Discount -->
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                <div>
                    <label for="original_price" class="block text-sm font-medium text-gray-700">Original Price ($)</label>
                    <input type="number" step="0.01" name="original_price" id="original_price" value="{{ old('original_price', $offer->original_price ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="discounted_price" class="block text-sm font-medium text-gray-700">Discounted Price ($)</label>
                    <input type="number" step="0.01" name="discounted_price" id="discounted_price" value="{{ old('discounted_price', $offer->discounted_price ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount Percentage (%)</label>
                    <input type="number" name="discount" id="discount" value="{{ old('discount', $offer->discount ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type / Tag</label>
                    <input type="text" name="type" id="type" value="{{ old('type', $offer->type ?? '') }}" placeholder="e.g. Trending, New, Sale"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                </div>
            </div>

            <!-- Link -->
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700">Target Link (Optional)</label>
                <input type="url" name="link" id="link" value="{{ old('link', $offer->link ?? '') }}" placeholder="https://..."
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
            </div>

            <!-- Active Toggle -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $offer->is_active ?? true) ? 'checked' : '' }}
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Active (Show on website)
                </label>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-end space-x-3">
            <a href="{{ route('admin.dashboard') }}" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                Cancel
            </a>
            <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{ isset($offer) ? 'Update Offer' : 'Create Offer' }}
            </button>
        </div>
    </form>
</div>
@endsection
