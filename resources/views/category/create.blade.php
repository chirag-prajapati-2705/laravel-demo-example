<x-app-layout>
    {{-- <x-alert type="error" :message="$message" class="mb-4"/> --}}


    <div class="col-sm-12">
        @if (session()->get('success'))
        <div class="alert alert-success"> {{ session()->get('success') }} </div>
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{session()->get('success')}}</span>
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

    <div class="py-12">

        <div class="container mt-5 item-center flex flex-col justify-center items-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @if ($errors->has('category_name'))
                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                @endif
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form class="w-full max-w-sm" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Category Name
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" value="" name='category_name'>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Slug
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" value="" name='slug'>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Is Active
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name='is_active' class="" id="inline-full-name" type="checkbox" value="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Description
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea name='description' class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
              </textarea>

                            </div>
                        </div>

                        <input type="file" name="category_image">


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