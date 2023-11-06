<x-app-layout>
    <x-slot name="header" class="bg-black">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <x-table class="w-full">
            <x-slot name="header" class="border-b-2">
                <tr>
{{--                    <th scope="col" class="px-4 py-2">ID</th>--}}
                    <th scope="col" class="px-4 py-2">Name</th>
                    <th scope="col" class="px-4 py-2">Email</th>
                    <th scope="col" class="px-4 py-2">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($users as $user)
                    <tr>
{{--                        <td class="px-4 py-2">{{ $user->id }}</td>--}}
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 flex justify-center items-center">
                            @can('update', $user)
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="p-2 transition-colors hover:text-amber-700">
                                    <x-simpleline-pencil class="w-4 h-4"/>
                                </a>
                            @endcan
                            @can('delete', $user)
                                <form
                                    action="{{ route('users.destroy', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 transition-colors hover:text-red-800">
                                        <x-simpleline-trash class="w-4 h-4"/>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    </x-slot>

    <div class="w-1/2 mx-auto">
        {{ $users->onEachSide(5)->links() }}
    </div>
</x-app-layout>
