<x-app-layout>
    <!-- <div>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Post</h1>
            <a href="{{route('post.create')}}">Create</a>
            <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Content</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Updated At</th>
    
                </tr>
            </thead>
            <tbody>
                
                @foreach ($posts as $post )
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$post->slug}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$post->content}}</td>
                    <td>
                                <a href="{{route('post.edit',$post->id)}}">Edit</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" name="deletd" value="Delete">
                                </form>
                            </td>
                </tr>    
                @endforeach
                
                    
            </tbody>
            {{ $posts->render() }}


        </table>
        </div>
        
    </div> -->

    <div class="p-6 max-w-7xl mx-auto bg-gray-50">
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-700">Post Listings</h1>
            <a href="{{route('post.create')}}" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                Create Post
            </a>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative max-w-md">
                <input
                    type="text"
                    placeholder="Search posts..."
                    class="block w-full px-4 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                <button class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                    🔍
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-hidden rounded-lg shadow-lg">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Slug</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Content</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Created At</th>
                        <th scope="col" class="px-6 py-3 text-right text-sm font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    @foreach ($posts as $post )
                    <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$post->id}}</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$post->title}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$post->slug}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$post->content}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$post->created_at}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            <a href="{{route('post.edit',$post->id)}}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="post" class="ml-4 text-red-600 hover:text-red-900">
                                @method('DELETE')
                                @csrf
                                <input type="submit" name="deletd" value="Delete" >
                            </form> 
                            <!-- <a href="/delete" class="ml-4 text-red-600 hover:text-red-900">Delete</a> -->
                        </td>
                    </tr>
                    @endforeach
                    <!-- Add more rows here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-500">Showing 1 to 10 of 50 results</p>
            <div class="flex space-x-2">
                {{ $posts->render() }}

            </div>
        </div>
    </div>


</x-app-layout>