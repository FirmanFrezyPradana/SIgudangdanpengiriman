@extends('gudang.navbar')
@section('container')
@vite(['resources/css/app.css','resources/js/app.js'])
<div class="w-full p-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-gra-400 dark:text-white">
                    <th scope="col" class="px-6 py-3">
                        Kode Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kendaraan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sesi Pengiriman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pengirim
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data_pengiriman as $pengiriman )
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pengiriman->pemesanan_kode }}
                    </td>
                    <th scope="px-6 py-4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->kendaraan->nomor_polisi}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->jadwal->sesi_pengiriman }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->sopir->user->nama_pengguna}}
                    </th>
                    <td class="px-6 py-4">
                        {{$pengiriman->status}}
                    </td>
                </tr>
                @endforeach
                <!-- <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white" colspan="7">Tidak Ada pPengiriman</td>
                </tr> -->


            </tbody>
        </table>
    </div>
</div>
@endsection