<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
</head>

<body>
    <?php $this->load->view('components/sidebar_super_admin'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">

            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                <!-- Header -->
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Tambah User</h6>
                </div>

                <hr>

                <div class="mt-5 text-left">

                    <!-- Form Input -->
                    <form action="<?php echo base_url('superAdmin/aksi_tambah_user'); ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="grid md:grid-cols-2 md:gap-6">

                            <!-- Email Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="email" name="email" id="email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" required />
                                <label for="email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>

                            <!-- Username Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="username" id="username"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" required />
                                <label for="username"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                            </div>
                        </div>

                        <!-- Nama Depan & Nama Belakang Input -->
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nama_depan" id="nama_depan"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" required />
                                <label for="nama_depan"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                    Depan</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nama_belakang" id="nama_belakang"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" required />
                                <label for="nama_belakang"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                    Belakang</label>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">

                            <!-- Admin Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <!-- <label for="underline_select" class="sr-only">Underline select</label> -->
                                <select id="id_admin" name="id_admin"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Pilih Admin</option>
                                    <?php foreach ($admin as $row): ?>
                                    <option value="<?php echo $row->id_admin; ?>">
                                        <?php echo $row->email; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Organisasi Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="id_organisasi" class="sr-only">Organisasi</label>
                                <select name="id_organisasi"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Pilih Organisasi</option>
                                    <?php foreach ($organisasi as $row): ?>
                                    <option value="<?php echo $row->id_organisasi; ?>">
                                        <?php echo $row->nama_organisasi; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">

                            <!-- Jabatan Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="id_jabatan" name="id_jabatan"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $row): ?>
                                    <option value="<?php echo $row->id_jabatan; ?>">
                                        <?php echo $row->nama_jabatan; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Organisasi Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="id_shift" class="sr-only">Organisasi</label>
                                <select name="id_shift"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Pilih Shift</option>
                                    <?php foreach ($shift as $row): ?>
                                    <option value="<?php echo $row->id_shift; ?>">
                                        <?php echo $row->nama_shift; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="password" name="password" id="password"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " autocomplete="off" required />
                            <label for="password"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        </div>
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="showpass" type="checkbox" value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                    onchange="showPassword()">
                            </div>
                            <label for="showpass" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show
                                Password</label>
                        </div>

                        <!-- Button -->
                        <div class="flex justify-between">
                            <a class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                href="javascript:history.go(-1)">Kembali</a>
                            <button type="submit"
                                class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

<script>
function showPassword() {
    var passwordInput = document.getElementById("password");
    var showPassCheckbox = document.getElementById("showpass");
    if (showPassCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script>

</html>