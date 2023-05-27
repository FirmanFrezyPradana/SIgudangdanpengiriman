@extends('Sopir.navbar')
@section('container')
@vite(['resources/css/app.css','resources/js/app.js'])
<div class="w-full p-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        Sesi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tujuan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_jadwal as $jadwal )
                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$jadwal->sesi_pengiriman}}
                    </th>
                    <td class="px-6 py-4">
                        {{$jadwal->jam_berangkat}}
                    </td>
                    <td class="px-6 py-4">
                        {{$jadwal->tujuan}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection