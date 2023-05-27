<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="h-screen flex items-center justify-center px-4 lg:px-0">
        @if (session()->has('loginError'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            {{session('loginError')}}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
        @endif
        <div class="w-full shadow-lg max-w-sm bg-white p-8 lg:p-12 rounded-lg leading-normal">
            <div class="text-3xl font-light uppercase mb-6 ">Register</div>
            <form action="{{route('actionregister')}}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="" class="text-lg mb-2 text-gray-300 block">Nama</label>
                    <input type="text" name="nama_pengguna" placeholder="Nama" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <div class="mb-5">
                    <label for="username" class="text-lg mb-2 text-gray-300 block">Username</label>
                    <input type="text" name="username" placeholder="Username" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <div class="mb-5">
                    <label for="email" class="text-lg mb-2 text-gray-300 block">Email</label>
                    <input type="email" name="email" placeholder="youremail@gmail.com" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <div class="mb-5">
                    <label for="password" class="text-lg mb-2 text-gray-300 block">Password</label>
                    <input type="password" name="password" placeholder="Password" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <input type="hidden" name="status" value="belum verifikasi">
                <input type="hidden" name="id_pegawai" value="3">
                <button type="submit" class="py-2 px-3 bg-blue-500 rounded-lg text-white hover:bg-blue-600">Register</button>
            </form>

        </div>
    </div>
</body>

</html>