@extends('dashboard.layouts.dashboardmain')
@section('title', 'Home')
@section('content')
<div class="w-full px-6 pt-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Jumlah Alternatif</p>
                                    @if($latestAlternatif)
                                        {{-- Menampilkan data terakhir jika ada --}}
                                        <h5 class="mb-2 font-bold dark:text-white">{{$latestAlternatif->id}}</h5>
                                    @else
                                        {{-- Menampilkan nilai null jika tidak ada data --}}
                                        <h5 class="mb-2 font-bold dark:text-white">0</h5>
                                    @endif</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i
                                    class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Jumlah Criteria</p>
                                    @if($latestCriteria)
                                    {{-- Menampilkan data terakhir jika ada --}}
                                    <h5 class="mb-2 font-bold dark:text-white">{{$latestCriteria->id}}</h5>
                                @else
                                    {{-- Menampilkan nilai null jika tidak ada data --}}
                                    <h5 class="mb-2 font-bold dark:text-white">0</h5>
                                @endif</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-white dark:bg-slate-850 p-3 mt-3 rounded-lg border border-blue-500 dark:border-slate-800">
        <iframe src="{{asset('assets/jurnal/SPKPemberianRewarddanPunishment.pdf')}}" class="w-full h-96 rounded-lg" frameborder="0" height="450px"></iframe>
</div>

<div class="mb-6"></div>

<div class="flex">
    <!-- Card 1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
        <div class="relative flex flex-col min-w-0 break-words border border-blue-500 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="card border-success mb-3 max-w-18rem text-center">
                    <div class="card-header bg-transparent border-success">Anggota 1</div>
                    <div class="card-body text-success">
                        <h5 class="card-title">Nadya Putri Amalia</h5>
                        <p class="card-text">NIM. 2141720043</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2">
        <div class="relative flex flex-col min-w-0 break-words border border-blue-500 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="card border-success mb-3 max-w-18rem text-center">
                    <div class="card-header bg-transparent border-success">Anggota 2</div>
                    <div class="card-body text-success">
                        <h5 class="card-title">Ryan Syaputra Arty Wijaya</h5>
                        <p class="card-text">NIM. 2141720089</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    @include('dashboard.layouts.footer')
</div>

@endsection
