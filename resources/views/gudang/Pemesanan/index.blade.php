@extends('gudang.navbar')
@section('container')
@vite(['resources/css/app.css','resources/js/app.js'])
<div class="w-full p-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <!-- <a href="{{route('pemesanan')}}">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    + Pemesanan
                </button>
            </a> -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-gra-400 dark:text-white">
                    <th scope="col" class="px-6 py-3">
                        Kode Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID OUTLET
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tanggal Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_pemesanan as $pesanan )
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pesanan->kode_pemesanan}}
                    </td>
                    <th scope="px-6 py-4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pesanan->nama_outlet}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pesanan->tanggal_pemesanan}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pesanan->status_pemesanan}}
                    </th>
                    <td class="px-6 py-4">
                        <a hreff="" data-modal-target="authentication-modal{{$pesanan->kode_pemesanan}}" data-modal-toggle="authentication-modal{{$pesanan->kode_pemesanan}}" type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><i class="bi bi-gear"></i></a>
                    </td>
                </tr>
                <!-- Main modal -->
                <div id="authentication-modal{{$pesanan->kode_pemesanan}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal{{$pesanan->kode_pemesanan}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Pengiriman Barang</h3>
                                <form class="space-y-6" action="{{route('pengirimanBarang')}}" method="post">
                                    @csrf
                                    <input readonly name="pemesanan_kode" value="{{$pesanan->kode_pemesanan}}" class="mb-3">
                                    <div class="mb-2">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kendaraan</label>
                                        <select id="countries" name="id_kendaraan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>-Pilih Kendaraan-</option>
                                            @foreach ( $data_kendaraan as $kendaran )
                                            <option value="{{$kendaran->id}}">{{$kendaran->jenis_kendaraan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal Pengiriman</label>
                                        <select id="countries" name="id_jadwal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>-Pilih Sesi-</option>
                                            @foreach ( $data_jadwal as $jadwal )
                                            <option value="{{$jadwal->id}}">{{$jadwal->jam_berangkat}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sopir</label>
                                        <select id="countries" name="id_sopir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>-Pilih Sopir-</option>
                                            @foreach ( $data_sopir as $sopir )
                                            <option value="{{$sopir->id}}">{{ $sopir->user->nama_pengguna}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="status" value="Sedang Diproses" class="mb-2">
                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white" colspan="7">Pemesanan masih kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



@endsection