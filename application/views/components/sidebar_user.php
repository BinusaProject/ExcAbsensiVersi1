<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <link rel="icon" href="<?php echo base_url(
        './src/assets/image/absensi.png'
    ); ?>" type="image/gif">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<?php
$id_user = $_SESSION['id']; // Misalkan informasi session disimpan dalam $_SESSION
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$image = $_SESSION['image'];

// $currentDate = date('Y-m-d');
// $absensiHariIni = $this->user_model->getAbsensiByDate($currentDate); // Mendapatkan data absensi hari ini

// if (empty($absensiHariIni) || !$absensiHariIni[0]->status) {
//     // Tidak ada data absensi atau status belum absen masuk
//     $pulangLink = '#'; // Atur link ke '#' jika tidak bisa melakukan absen pulang
//     $pulangOnClick = "Swal.fire({
//         title: 'Maaf!',
//         text: 'Anda belum melakukan absen masuk hari ini.',
//         icon: 'error',
//         showConfirmButton: false, // Menghilangkan tombol OK
//         timer: 2000 // Timer dalam milidetik (misalnya, 3000 untuk 3 detik)
//     });";
// } else {
//     // Ada data absensi hari ini dan status absen masuk sudah dilakukan
//     $pulangLink = base_url('user/pulang');
//     $pulangOnClick = ''; // Tidak ada SweetAlert
// }
?>

<body>

    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full bg-indigo-500 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">

                    <!-- Hamburger Menu -->
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-black rounded-lg sm:hidden">
                        <i class="fa-solid fa-bars fa-xl" aria-hidden="true"></i>
                    </button>
                    <a class="flex ml-2 md:mr-24">

                        <!-- Logo Aplikasi -->
                        <img src="<?php echo base_url(
                            './src/assets/image/absensi.png'
                        ); ?>" class="h-10 mr-3" alt="Absensi Logo" />

                        <!-- Nama Aplikasi -->
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Absensi
                            App</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="<?= base_url(
                                    'images/user/' . $image
                                ) ?>" alt="user photo"></a>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-indigo-50 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    <?= $username ?>
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    <?= $email ?>
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="<?php echo base_url(
                                        'user/profile'
                                    ); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100
                                        dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Profile</a>
                                </li>
                                <li>
                                    <a onclick="confirmLogout();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-indigo-50 border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-indigo-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">

                <!-- Menu Dashboard -->
                <li>
                    <a href="<?php echo base_url('user'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fas fa-tachometer-alt fa-fw fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Dropdown Absen -->
                <!-- <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-masterdata" data-collapse-toggle="dropdown-masterdata">
                        <i
                            class="fa-solid fa-address-card fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Absensi</span>
                        <i
                            class="fa-solid fa-chevron-down fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    </button>

                    <ul id="dropdown-masterdata" class="hidden py-2 space-y-2"> -->

                <!-- Menu Masuk -->
                <!-- <li>
                            <a href="<?php echo base_url('user/absen'); ?>"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i
                                    class="fa-solid fa-right-to-bracket fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ml-3 whitespace-nowrap">Masuk</span>
                            </a>
                        </li> -->

                <!-- Menu Pulang -->
                <!-- <li>
                            <a href="<?php echo base_url('user/pulang'); ?>"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i
                                    class="fa-solid fa-right-from-bracket fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ml-3 whitespace-nowrap">Pulang</span>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- Menu Izin -->
                <li>
                    <a href="<?php echo base_url('user/izin'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-circle-xmark fa-fw fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Izin</span>
                    </a>
                </li>

                <!-- Menu Cuti -->
                <li>
                    <a href="<?php echo base_url('user/cuti'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-mug-hot fa-fw fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Cuti</span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo base_url('user/history_cuti'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-calendar-alt fa-fw fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Permohonan Cuti</span>
                    </a>
                </li>

                <!-- Menu History -->
                <li>
                    <a href="<?php echo base_url('user/history_absensi'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-clock-rotate-left fa-fw fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">History</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
    </div>
</body>

<script>
function confirmLogout() {
    Swal.fire({
        title: 'Yakin ingin logout?',
        text: "Anda akan keluar dari akun Anda.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo base_url('auth/logout'); ?>";
        }
    });
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>