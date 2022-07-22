<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <form class="form-group" method="POST" action="{{ route('tenant.category.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" name="category_name" />
                            <br>
                            <input type="file" name="photo" id="photo" class="form-control"/>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Save"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
