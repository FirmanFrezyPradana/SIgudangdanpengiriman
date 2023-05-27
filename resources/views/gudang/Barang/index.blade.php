@extends('gudang.navbar')
@section('container')
@vite(['resources/css/app.css','resources/js/app.js'])
<div class="w-full p-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="dataTable">
            <button data-modal-target=" authentication-modal" data-modal-toggle="authentication-modal" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                + Barang
            </button>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-gra-400 dark:text-white text-center">
                    <th scope="col" class="p-4">
                        Kode Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Satuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>

                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ( $data_barang as $barang )
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                    <td class="px-6 py-4">
                        {{$barang->kode_barang}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$barang->nama_barang}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$barang->kategori->nama_kategori}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$barang->satuan}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$barang->harga}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$barang->stoke_akhir}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('destroyBarang',['id' => $barang->id ])  }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"><i class="bi bi-trash3"></i></a>
                        <a href="#" data-modal-target="update-modal{{$barang->id}}" data-modal-toggle="update-modal{{$barang->id}}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <!-- Main modal -->
                    <div id="update-modal{{$barang->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="update-modal{{$barang->id}}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Data Barang Masuk</h3>
                                    <form class="space-y-6" action="{{route('UpdateBarang')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$barang->id}}">
                                        <div>
                                            <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Barang</label>
                                            <input type="text" name="kode_barang" value="{{$barang->kode_barang}}" id="kode_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        <div>
                                            <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" id="nama_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="id_gudang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Gudang</label>
                                                <select id="id_gudang" name="id_gudang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{$barang->id_gudang}}" selected>{{$barang->gudang->nama_gudang}}</option>
                                                    @foreach( $data_gudang as $gudang )
                                                    <option value="{{$gudang->id}}">{{$gudang->nama_gudang}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for="id_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Barang</label>
                                                <select id="id_kategori" name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{$barang->id_kategori}}" selected>{{$barang->kategori->nama_kategori}}</option>
                                                    @foreach( $data_kategori as $kategori )
                                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">satuan Barang</label>
                                                <select id="satuan" name="satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>{{$barang->satuan}}</option>
                                                    <option value="PC">Pieces</option>
                                                    <option value="DUS">Kardus</option>
                                                    <option value="PAK">Pak</option>
                                                    <option value="BAL">Ball</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                                <input type="text" name="harga" value="{{$barang->harga}}" id="harga" placeholder="Rp." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                            <div>
                                                <label for="stoke_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Awal</label>
                                                <input type="text" name="stoke_awal" value="{{$barang->stoke_awal}}" id="stoke_awal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Input Data Barang Masuk</h3>
                <form class="space-y-6" action="{{route('storeBarang')}}" method="post" autocomplete="off">
                    @csrf
                    <div>
                        <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Barang</label>
                        <input type="text" name="kode_barang" id="kode_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="id_gudang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Gudang</label>
                            <select id="id_gudang" name="id_gudang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>--lokasi gudang--</option>
                                @foreach( $data_gudang as $gudang )
                                <option value="{{$gudang->id}}">{{$gudang->nama_gudang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="id_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Barang</label>
                            <select id="id_kategori" name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>--kategori Barang--</option>
                                @foreach( $data_kategori as $kategori )
                                <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">satuan Barang</label>
                            <select id="satuan" name="satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>--Satuan Barang--</option>
                                <option value="PC">Pieces</option>
                                <option value="DUS">Kardus</option>
                                <option value="PAK">Pak</option>
                                <option value="BAL">Ball</option>
                            </select>
                        </div>
                        <div>
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="text" name="harga" id="harga" placeholder="Rp." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="stoke_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Awal</label>
                            <input type="text" name="stoke_awal" id="stoke_awal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection