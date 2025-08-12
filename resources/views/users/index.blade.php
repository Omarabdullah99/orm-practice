<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- যদি Tailwind ব্যবহার করেন --}}
    <title>Document</title>
</head>

<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Create button --}}
                    <div class="mb-4 text-right">
                        <a href="{{ route('user.create') }}">
                            <button class="bg-indigo-500 dark:bg-indigo-500 cursor-pointer">Add a User</button>
                        </a>
                    </div>

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="mb-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Success</span>
                            <div>
                                <span class="font-medium">Success!</span> {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3" scope="col">
                                        Name
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Email
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        <span class="sr-only">View</span>
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('user.single', $user) }}"
                                                class="font-medium text-green-600 dark:text-blue-500 hover:underline"
                                                target="_blank">View</a>

                                            <a href="{{ route('user.edit', $user) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form class="inline-flex" action="{{route('user.delete', $user)}}" method="POST"
                                                onclick="return confirm('Are you sure, bro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600 hover:underline dark:text-red-500">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            No Data Available
                                        </th>
                                        <td class="px-6 py-4">

                                        </td>
                                        <td class="px-6 py-4">

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="mt-4">{{ $posts->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
