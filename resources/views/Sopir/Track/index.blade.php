@extends('Sopir.navbar')
@section('container')

<div class="w-full p-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-gra-400 dark:text-white text-center">
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
                        Status Pengiriman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Track
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $data_pengiriman as $pengiriman )
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->pemesanan_kode}}
                    </td>
                    <th scope="px-6 py-4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->kendaraan->nomor_polisi}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->jadwal->jam_berangkat }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pengiriman->sopir->user->nama_pengguna}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($pengiriman->status == 'Sedang Diproses')
                        <i class="bi bi-truck px-3 py-2 text-xl font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 "></i>
                        @endif
                    </th>
                    <td class="px-6 py-4">
                        <button type="button" data-modal-target="authentication-modal{{$pengiriman->id}}" data-modal-toggle="authentication-modal{{$pengiriman->id}}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><i class="bi bi-gear"></i></button>
                    </td>
                </tr>
                <div id="authentication-modal{{$pengiriman->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal{{$pengiriman->id}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{$pengiriman->pemesanan_kode}}</h3>
                                <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Aturan Penulisan Track</span>
                                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                                            <li>Isi terlebih dahulu tanggal dan waktu</li>
                                            <li>Tuliskan rute contoh="Paket Sampai jepun"</li>
                                            <li>Apabila pesanan sampai cukup menuliskan "Pesanan diterima"</li>
                                        </ul>
                                    </div>
                                </div>
                                <form class="space-y-6" action="{{route('trackStore')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$pengiriman->pemesanan_kode}}" name="kode_invoice">
                                    <div class="mb-2">
                                        <label for="tanggal_waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tanggal dan waktu</label>
                                        <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="track_rute" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">lokasi saat ini</label>
                                        <input type="text" name="track_rute" id="track_rute" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <button type="submit" class="w-full text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white" colspan="7">Belum ada pengiriman untuk anda</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection