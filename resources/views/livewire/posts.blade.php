<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="m-5">       
                    <form class="flex items-center justify-between gap-2">
                        <div class="relative md:w-1/2 w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                
                            </div>
                            <input type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Search post..." wire:model.live="search" />
                        </div>

                        <div class="relative md:w-1/4 w-full">
                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.live="category">
                                <option selected>Choose a category</option>
                                @foreach($categories AS $key => $value)
                                    <option value="{{ $key }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Published
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @forelse($posts AS $post)
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="px-6 py-4">
                                            {{ $post->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->slug }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->content }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->publised ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $post->category->name }}
                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $post->user->name }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-center" colspan="6">
                                            Sin Resultados
                                        </td>
                                    </tr>
                                @endforelse
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="p-6">
                    {{ $posts->links(data: ['scrollTo' => false]) }}
                </div>
            </div>
        </div>
    </div>
</div>