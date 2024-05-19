<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h5 class="block text-center text-gray-700 text-xl font-bold mb-4">Login to Desa Jatimulyo</h5>
                <form action="<?= urlpath('login'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email address</label>
                        <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Login</button>
                </form>
                <div class="flex items-center justify-between mt-4">
                    <a href="<?=BASEURL?>" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Home</a>
                    <a href="<?=urlpath('register');?>" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

