@extends('layouts.admin')

@section('title', 'Manage Blogs')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
    <!-- Header -->
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">All Blog Posts</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">View, edit, and create travel articles.</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Write New Article
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title / Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published Date</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($blogs as $blog)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded overflow-hidden">
                            @if($blog->main_image)
                            <img class="h-16 w-16 object-cover" src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}" alt="">
                            @else
                            <span class="flex items-center justify-center h-full text-gray-400 text-xs">No Img</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $blog->title }}</div>
                        <div class="text-sm text-gray-500">{{ $blog->category }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($blog->status === 'published')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $blog->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ url('/blog/' . $blog->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-600">View</a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Are you sure? This will delete the blog post permanently.')" class="inline">
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
                        No blog posts found. Start writing your first article!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
        {{ $blogs->links() }}
    </div>
    @endif
</div>
@endsection
