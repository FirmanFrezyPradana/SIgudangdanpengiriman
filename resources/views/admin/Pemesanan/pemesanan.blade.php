@extends('admin.navbar')
@section('container')
@vite(['resources/css/app.css','resources/js/app.js'])

<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="grid grid-cols-2 grid-flow-col-dense gap-4 mb-4">
        <div class="flex col-span-2 items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <form class="w-full px-5">
                <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kode Barang / Nama Barang" required>
            </form>
        </div>
        <div class="flex items-center justify-center max-h-80 rounded bg-gray-50 dark:bg-gray-800">
            <table class="table-auto text-center">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4">BRG0001</td>
                        <td class="px-6 py-4">Vanbel K44</td>
                        <td class="px-6 py-4">20</td>
                        <td class="px-6 py-4">144.000</td>
                        <td class="px-6 py-4">Tambah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex h-full rounded bg-gray-50 dark:bg-gray-800">
        <div class="w-full p-4">
            <form>
                <div class="grid gap-6 mb-10 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pemesanan</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Outlet</label>
                        <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tangal Pemesanan</label>
                        <input type="date" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="w-full grid mt-10">
                    <table class=" table-auto text-center border">
                        <thead>
                            <tr>
                                <th class="px-5 py-4">Kode Barang</th>
                                <th class="px-5 py-4">Nama Barang</th>
                                <th class="px-5 py-4">Satuan</th>
                                <th class="px-5 py-4">Jumlah</th>
                                <th class="px-5 py-4">Harga</th>
                                <th class="px-5 py-4">Diskon</th>
                                <th class="px-5 py-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <td>BRG-K44-VANBEL</td>
                                <td>Vanbel K44</td>
                                <td>pcs</td>
                                <td><input type="text" name="" id="" class="w-14 h-8 border-transparent text-center" value="1"></td>
                                <td>144.000</td>
                                <td><input type="text" name="" id="" class="w-14 h-8 border-transparent  text-center" value="0"></td>
                                <td><input type="text" name="" id="" class="w-32 h-8 border-transparent  text-center" value="144.000"></td>
                            </tr>
                            <tr class="border">
                                <td>BRG-K44-VANBEL</td>
                                <td>Vanbel K44</td>
                                <td>pcs</td>
                                <td><input type="text" name="" id="" class="w-14 h-8 border-transparent text-center" value="1"></td>
                                <td>144.000</td>
                                <td><input type="text" name="" id="" class="w-14 h-8 border-transparent  text-center" value="0"></td>
                                <td><input type="text" name="" id="" class="w-32 h-8 border-transparent  text-center" value="144.000"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="grid gap-2 mt-10 justify-items-end">
                    <div class="w-60">
                        <input type="text" id="first_name" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    </div>
                    <div class="w-60">
                        <input type="text" id="last_name" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    </div>
                </div>
                <button type="submit">Buat Pesanan</button>
            </form>
        </div>
    </div>
</div>
@endsection