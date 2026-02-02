@extends('layouts.admin')

@section('title', 'Promotional Offers')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
    <!-- Header -->
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">All Offers</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Manage your latest promotional popups.</p>
        </div>
        <a href="{{ route('admin.offers.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add New Offer
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title / Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price Details</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($offers as $offer)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex-shrink-0 h-16 w-16">
                            <img class="h-16 w-16 rounded object-cover" src="{{ $offer->image }}" alt="">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $offer->title }}</div>
                        <div class="text-sm text-gray-500 truncate max-w-xs">{{ $offer->description }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($offer->is_active)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                        @endif
                        @if($offer->type)
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $offer->type }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($offer->discounted_price)
                        <div class="font-medium text-gray-900">${{ $offer->discounted_price }}</div>
                        <div class="line-through text-xs">${{ $offer->original_price }}</div>
                        @elseif($offer->discount)
                        <div class="text-green-600 font-medium">{{ $offer->discount }}% OFF</div>
                        @else
                        -
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.offers.edit', $offer) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.offers.destroy', $offer) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No offers found. Create one to get started.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($offers->hasPages())
    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
        {{ $offers->links() }}
    </div>
    @endif
</div>
@endsection
