<x-admin-layout>

    <div class="min-h-screen">

        <div class="w-1/2 mx-auto mt-12 border border-gray-400 p-16 rounded-md bg-white">
            <form method="POST" action="{{ route('register') }}" class="container">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium ">Nama</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-500"
                        value="{{ old('name') }}" placeholder="Siapa namamu?">
                        @error('name')
                            <div class="text-red-400 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium ">Username</label>
                    <input type="text" id="username" name="username"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-500"
                        value="{{ old('username') }}" placeholder="Username...">
                        @error('username')
                            <div class="text-red-400 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium ">Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-500"
                        value="{{ old('email') }}" placeholder="admin.helpdesk@gmail.com">
                        @error('email')
                            <div class="text-red-400 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium ">password anda :</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-500"
                        placeholder="********">
                        @error('password')
                            <div class="text-red-400 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                {{-- <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium ">Remember me</label>
                </div> --}}
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>

    </div>

</x-admin-layout>