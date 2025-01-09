<x-app-layout>
    {{-- <x-alert type="error" :message="$message" class="mb-4"/> --}}

    <div class="py-12">
        <div class="container mt-5 item-center max-w-7xl justify-center items-center ">
            <div class="flex flex-col mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8  p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h1>Create Post</h1>
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <div class="col-sm-12">
                        @if (session()->get('success'))
                        <div class="alert alert-success"> {{ session()->get('success') }} </div>
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{ session()->get('success') }}</span>
                        </div>
                        @endif
                    </div>
                    @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <form class="w-full max-w-xl" method="POST" action="{{ route('post.store') }}">
                        @csrf

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Title
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input  value="{{$post->title}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" value="" name='title'>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Slug
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name='slug' value="{{$post->slug}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" value="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Content
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea  name='content' class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                           {{ $post->content }}
                            </textarea>

                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Content
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="categories[]" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <a href="/" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    Cancel
                                </a>
                                <input value="Save" class="ml-4 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">

                                </input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>