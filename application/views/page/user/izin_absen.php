<!-- application/views/izin_page.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <link rel="icon" href="<?php echo base_url('./src/assets/image/absensi.png'); ?>" type="image/gif">
</head>

<body>
    <?php $this->load->view('components/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">
            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h6 class="text-left mb-2 text-xl font-bold text-gray-900 dark:text-white">Izin</h6>
                <p class="text-center mb-5">
                    <?php echo getNamaHari($date); ?>,
                    <?php echo convDate($date); ?>
                    <?php echo $time; ?>
                    <br>
                    <?php echo $greeting; ?>,
                    <span><?php echo $this->session->userdata('username'); ?></span>
                </p>
                <hr class="mb-7">

                <!-- Formulir untuk permintaan izin -->
                <form action="<?php echo base_url('user/aksi_izin_tengah_hari')?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id_absensi" value="<?php echo $absensi->id_absensi; ?>">
                    <!-- Field formulir untuk cuti dari -->
                    <div>
                        <label for="leave_from" class="block text-gray-700 font-bold mb-1 text-left">Keterangan Izin
                            :</label>
                        <textarea id="message" name="keterangan_izin" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Keterangan . . ." autocomplete="off"></textarea>
                    </div>
                    <br>

                    <!-- Tombol Izin -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-indigo-500 hover:bg-indigo500 text-white py-2 px-4 rounded-md"><i
                                class="fa-solid fa-calendar-xmark"></i></button>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>