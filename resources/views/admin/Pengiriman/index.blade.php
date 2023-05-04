@extends('admin.navbar')
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
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        SUB-20230427-1
                    </td>
                    <th scope="px-6 py-4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Mobil Box
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        sesi 3
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Firman
                    </th>
                    <td class="px-6 py-4">
                        sedang dikirim
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection