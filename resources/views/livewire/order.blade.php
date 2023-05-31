<div>
    <style>
        body {
            overflow-y: hidden;
        }
    </style>
    <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-2 grid-flow-col-dense gap-4 mb-4">
            <div class="flex shadow-md col-span-2 w-full items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                <form class="w-full px-5">
                    <input wire:model="search" type="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kode Barang / Nama Barang" required>
                </form>
            </div>
            <div class="flex items-center justify-center max-h-80 rounded bg-gray-50 dark:bg-gray-800">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-1">
                                    KODE BARANG
                                </th>
                                <th scope="col" class="px-4 py-1">
                                    NAMA
                                </th>
                                <th scope="col" class="px-4 py-1">
                                    STOK
                                </th>
                                <th scope="col" class="px-4 py-1">
                                    HARGA
                                </th>
                                <th scope="col" class="px-4 py-1">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body">
                            @foreach ($orders as $order)
                            <tr class="text-center  border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-1">{{$order->kode_barang}}</td>
                                <td class="px-4 py-1">{{$order->nama_barang}}</td>
                                <td class="px-4 py-1">{{$order->stoke_akhir}}</td>
                                <td class="px-4 py-1">{{$order->harga}}</td>
                                <td class="px-4 py-1"><button type="button" wire:click="addOrder({{ $order->id }})" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><i class="bi bi-cart-check"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-2">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex mt-18 h-[70%] rounded shadow-md bg-gray-50 dark:bg-gray-800">
            <div class="w-full p-4 max-h-10 sm:rounded-lg">
                <form action="" wire:submit.prevent="store">
                    <div class="grid gap-6 mb- md:grid-cols-3">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pemesanan</label>
                            <input type="text" readonly wire:model="KodePemesanan" id="first_name" class="border-0 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Outlet</label>
                            <select id="countries" wire:model="id_outlet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Outlet</option>
                                @foreach ( $outlets as $outlet )
                                <option value="{{$outlet->id}}">{{$outlet->nama_outlet}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tangal Pemesanan</label>
                            <input type="date" wire:model="tangggal_pemesanan" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 mt-4 ">
                        <div class="grow relativen h-96 overflow-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="text-center">
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kode Barang
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Qty
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            total
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="overfl">
                                    @forelse ($keranjang as $index => $data )
                                    <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{$loop->index+1}}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $data['kode_barang'] }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $data['nama_barang']}}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $data['harga'] }}
                                        </td>
                                        <td class=" justify-item-center px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <button wire:click="decrementQty({{ $index }})" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                    <span class="sr-only">Quantity button</span>
                                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                                <input type="number" wire:model="keranjang.{{ $index }}.qty" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                                                <button wire:click="incrementQty({{ $index }})" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                    <span class="sr-only">Quantity button</span>
                                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{$data['total']}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline" wire:click="removeOrder({{ $data['id'] }})"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white" colspan="7">Pemesanan masih kosong.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="grid md:grid-cols-1 justify-items-end gap-6 mt-4 shadow-xl rounded-md p-6">
                            <div class="">
                                <label for="first_name" class="block text-sm font-medium text-gray-900 dark:text-white">Sub Total Item</label>
                                <input type="text" wire:model="totalitem" id="first_name" class=" border-0 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div class="">
                                <label for="visitors" class="blocktext-sm font-medium text-gray-900 dark:text-white">Sub Total Faktur</label>
                                <input type="text" wire:model="totalHarga" id="visitors" class="border-0 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                            <div class="">
                                <button type="submit" class="justify-end   text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                    </svg>
                                    Buat Pesanan
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>
</div>