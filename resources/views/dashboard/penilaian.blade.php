@extends('dashboard.layouts.dashboardmain')
@section('title', 'criteria')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3 overflow-x-hidden">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Authors table</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-6 overflow-x-auto">
                        <table
                            class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alternatif</th>
                                    @foreach ($criteria as $c)
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            {{ $c->criteria_code }}</th>
                                    @endforeach
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $a)
                                    <tr>
                                        <td
                                            class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $a->alternatif_name }}
                                            </span>
                                        </td>
                                        @foreach ($criteria as $c)
                                            @php
                                                $penilaianForCriteria = $penilaian
                                                    ->where('id_alternatif', $a->id)
                                                    ->where('id_criteria', $c->id)
                                                    ->first();
                                            @endphp

                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $penilaianForCriteria ? $penilaianForCriteria->nilai : 0 }}
                                                </span>
                                            </td>
                                        @endforeach

                                        {{-- Add a button --}}
                                        <td
                                            class="p-2 align-middle flex just bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <button type="button" data-modal-target="add-criterias-{{$a->id}}" data-modal-toggle="add-criterias-{{$a->id}}"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                        </td>
                                        <!-- Main modal -->
                                        <div id="add-criterias-{{ $a->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            {{ $a->alternatif_name }}
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="add-criterias-{{ $a->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form class="mx-3 p-4 md:p-5" id="add-criterias-{{ $a->id }}" action="{{ route('penilaian.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mx-2 grid gap-4 mb-4 grid-cols-2">
                                                            <input type="text" name="id_alternatif" hidden value="{{ $a->id }}">
                                                            @foreach ($criteria as $c)
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="nilai_{{ $c->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                        {{ $c->criteria_code }}
                                                                    </label>
                                                                    <input type="number" onchange="setTwoNumberDecimal" min="0" step="0.01"
                                                                        value="0"
                                                                        name="nilai[{{ $c->id }}]" id="nilai_{{ $c->id }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        placeholder="" required="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button type="submit"
                                                            class="m-2 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Add new product
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTwoNumberDecimal = myHTMLNumberInput.onchange ;

        function setTwoNumberDecimal(event) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    </script>
@endsection
