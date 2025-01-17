<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trainings') }}
        </h2>
    </x-slot>


    @if (session()->has('message'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-16">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 mb-4">
            <div class="overflow-x-auto w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Trainings Created') }}
                </h2>
                <table class="table-auto w-full my-2 max-w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <td class="px-4 py-2 cursor-pointer">
                                ID
                            </td>
                            <td class="px-4 py-2">
                                Type Training
                            </td>
                            <td class="px-4 py-2 cursor-pointer">
                                Rating
                            </td>

                            <td class="px-4 py-2">
                                Member
                            </td>
                            <td class="px-4 py-2">
                                Date Created
                            </td>
                            <td class="px-4 py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingcreated as $item)
                            <tr>
                                <td class="border px-4 py-2" NOWRAP>{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    {{ $item->typetraining }}
                                </td>
                                <td class="border px-4 py-2"> {{ getRatingTraining($item) }}</td>

                                <td class="border px-4 py-2 max-w-xs">
                                    VID:{{ $item->member->id }}/ {{ $item->member->firstname }}
                                    {{ $item->member->lastname }}
                                </td>

                                <td class="border px-4 py-2 max-w-xs ">
                                    {{ $item->created_at }}z
                                </td>
                                <td class="border px-2 py-2 text-center">

                                    <button wire:click="process({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Process</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $trainingcreated->links() }}
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 mb-4">
            <div class="overflow-x-auto w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Trainings Assigned') }}
                </h2>
                <table class="table-auto w-full my-2 max-w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <td class="px-4 py-2 cursor-pointer">
                                ID
                            </td>
                            <td class="px-4 py-2">
                                Type Training
                            </td>
                            <td class="px-4 py-2 cursor-pointer">
                                Rating
                            </td>

                            <td class="px-4 py-2">
                                Member
                            </td>
                            <td class="px-4 py-2">
                                Trainer
                            </td>
                            <td class="px-4 py-2">
                                Date Training
                            </td>
                            <td class="px-4 py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingassigned as $item)
                            <tr>
                                <td class="border px-4 py-2" NOWRAP>{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    {{ $item->typetraining }}
                                </td>
                                <td class="border px-4 py-2"> {{ getRatingTraining($item) }}</td>

                                <td class="border px-4 py-2 max-w-xs">
                                    VID:{{ $item->member->id }}/ {{ $item->member->firstname }}
                                    {{ $item->member->lastname }}
                                </td>
                                <td class="border px-4 py-2 max-w-xs">
                                    @if ($item->trainer)
                                        VID:{{ optional($item->trainer)->id }}/
                                        {{ optional($item->trainer)->firstname }}
                                        {{ optional($item->trainer)->lastname }}
                                    @endif
                                </td>

                                <td class="border px-4 py-2 max-w-xs ">
                                    @if ($item->date_training)
                                        {{ $item->date_training }}z
                                    @endif
                                </td>
                                <td class="border px-2 py-2 text-center">
                                    <button wire:click="edit({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Edit</button>
                                    <button wire:click="delete({{ $item->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $trainingassigned->links() }}
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 mb-4">
            <div class="overflow-x-auto w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Trainings Finish') }}
                </h2>
                <table class="table-auto w-full my-2 max-w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <td class="px-4 py-2 cursor-pointer">
                                ID
                            </td>
                            <td class="px-4 py-2">
                                Type Training
                            </td>
                            <td class="px-4 py-2 cursor-pointer">
                                Rating
                            </td>

                            <td class="px-4 py-2">
                                Member
                            </td>
                            <td class="px-4 py-2">
                                Trainer
                            </td>
                            <td class="px-4 py-2">
                                Date Training
                            </td>
                            <td class="px-4 py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingassigned as $item)
                            <tr>
                                <td class="border px-4 py-2" NOWRAP>{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    {{ $item->typetraining }}
                                </td>
                                <td class="border px-4 py-2"> {{ getRatingTraining($item) }}</td>

                                <td class="border px-4 py-2 max-w-xs">
                                    VID:{{ $item->member->id }}/ {{ $item->member->firstname }}
                                    {{ $item->member->lastname }}
                                </td>
                                <td class="border px-4 py-2 max-w-xs">
                                    @if ($item->trainer)
                                        VID:{{ optional($item->trainer)->id }}/
                                        {{ optional($item->trainer)->firstname }}
                                        {{ optional($item->trainer)->lastname }}
                                    @endif
                                </td>

                                <td class="border px-4 py-2 max-w-xs ">
                                    @if ($item->date_training)
                                        {{ $item->date_training }}z
                                    @endif
                                </td>
                                <td class="border px-2 py-2 text-center">
                                    <button wire:click="edit({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Edit</button>
                                    <button wire:click="delete({{ $item->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $trainingassigned->links() }}
        </div>

    </div>


</div>
