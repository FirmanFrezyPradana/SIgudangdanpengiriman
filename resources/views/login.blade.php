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
    @include('alert')
    <div class="h-screen flex items-center justify-center">
        <div class="w-full shadow-lg max-w-sm bg-white mx-4 p-8 lg:p-16 rounded-lg leading-normal">
            <div class="text-3xl  font-light uppercase mb-6 ">login</div>
            <form action="{{ route('actionlogin') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-5">
                    <label for="" class="text-sm mb-2 text-gray-300 block">Email</label>
                    <input type="text" name="email" placeholder="youremail@gmail.com" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <div class="mb-5">
                    <label for="" class="text-lg mb-2 text-gray-300 block">Password</label>
                    <input type="password" name="password" placeholder="********" id="" class="border p-2 rounded-lg w-full focus:border-blue-600 focus:outline-none">
                </div>
                <button type="submit" class="py-2 px-3 bg-blue-500 rounded-lg text-white hover:bg-blue-600">Login</button>
                <p class="mt-4 "><span class="text-gray-400"> Don't have an account ?</span><a class="" href="register"> Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>