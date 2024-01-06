<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <link rel="icon" href="<?php echo base_url('./src/assets/image/absensi.png'); ?>" type="image/gif">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    // Define the disableButton function
    function disableButton(button, jamMasuk) {
        console.log("Button clicked");
        button.disabled = true;

        // Enable the button after 2000 milliseconds (2 seconds), adjust as needed
        setTimeout(function() {
            button.disabled = false;
        }, 2000);

        // Do something with the jamMasuk value if needed
        console.log("Jam Masuk: " + jamMasuk);
    }

    // Attach click event listeners to the buttons
    $(document).ready(function() {
        $('.izinButton, .batalButton').click(function() {
            // Pass both 'this' and the jam_masuk value to the function
            disableButton(this, $(this).data('jam-masuk'));
        });
    });
    </script>
</head>

<body>
    <?php $this->load->view('components/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">

            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">History absensi</h6>
                </div>
                <hr>

                <!-- Tabel -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead
                            class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Masuk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Pulang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kehadiran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <!-- Tabel Body -->
                        <tbody class="text-center">
                            <?php
                            $no = 0;
                            foreach ($absensi as $row):
                                $no++; ?>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $no; ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo nama_user($row->id_user); ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo convDate($row->tanggal_absen); ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row->jam_masuk; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row->jam_pulang; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row->keterangan_izin; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row->status_absen; ?>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex justify-center">
                                        <?php if ($row->keterangan_izin == '-') : ?>
                                        <!-- Tombol Detail Absensi -->
                                        <a type="button"
                                            href="<?= base_url('user/detail_absensi/' . $row->id_absensi) ?>"
                                            class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"
                                            onclick="disableButton(this, '<?= $row->jam_masuk; ?>');">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                        <!-- Tombol Izin Absen -->
                                        <a type="button" href="<?= base_url('user/izin_absen/' . $row->id_absensi) ?>"
                                            class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 izinButton"
                                            data-jam-masuk="<?= $row->jam_masuk; ?>">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </a>
                                        <?php else : ?>
                                        <!-- Tombol Detail Absensi -->
                                        <a type="button"
                                            href="<?= base_url('user/detail_absensi/' . $row->id_absensi) ?>"
                                            class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"
                                            onclick="disableButton(this, '<?= $row->jam_masuk; ?>');">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                        <!-- Tombol Izin Absen -->
                                        <a type="button" href="<?= base_url('user/izin_absen/' . $row->id_absensi) ?>"
                                            class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 izinButton"
                                            data-jam-masuk="<?= $row->jam_masuk; ?>">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </a>
                                        <!-- Tombol Batal Izin -->
                                        <a type="button" href="<?= base_url('user/batal_izin/' . $row->id_absensi) ?>"
                                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800 batalButton"
                                            onclick="disableButton(this, '<?= $row->jam_masuk; ?>');">
                                            <i class="fa-solid fa-right-to-bracket"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <p class="text-left">Terlambat: <?php echo $jumlah_terlambat; ?></p>
                <p class="text-left">Lebih Awal: <?php echo $jumlah_lebih_awal; ?></p>
            </div>
        </div>
    </div>

</body>

<?php if ($this->session->flashdata('berhasil_absen')) { ?>
<script>
Swal.fire({
    title: "Berhasil",
    text: "<?php echo $this->session->flashdata('berhasil_absen'); ?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('berhasil_izin')) { ?>
<script>
Swal.fire({
    title: "Berhasil",
    text: "<?php echo $this->session->flashdata('berhasil_izin'); ?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('berhasil_cuti')) { ?>
<script>
Swal.fire({
    title: "Berhasil",
    text: "<?php echo $this->session->flashdata('berhasil_cuti'); ?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('berhasil_pulang')) { ?>
<script>
Swal.fire({
    title: "Berhasil",
    text: "<?php echo $this->session->flashdata('berhasil_pulang'); ?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('gagal_absen')) { ?>
<script>
Swal.fire({
    title: "Gagal",
    text: "<?php echo $this->session->flashdata('gagal_absen'); ?>",
    icon: "error",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('gagal_izin')) { ?>
<script>
Swal.fire({
    title: "Gagal",
    text: "<?php echo $this->session->flashdata('gagal_izin'); ?>",
    icon: "error",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('gagal_pulang')) { ?>
<script>
Swal.fire({
    title: "Gagal",
    text: "<?php echo $this->session->flashdata('gagal_pulang'); ?>",
    icon: "error",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('berhasil_pulang')) { ?>
<script>
Swal.fire({
    title: "Berhasil",
    text: "<?php echo $this->session->flashdata('berhasil_pulang'); ?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500
});

<?php } ?>
</script>

</html>