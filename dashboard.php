<?php
ob_start();
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <?php include('inc/header.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include('inc/sidebar.php'); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <section class="section">
            <?php
            if (isset($_GET['page'])) {
                if (file_exists('content/' . $_GET['page'] . ".php")) {
                    include('content/' . $_GET['page'] . ".php");
                } else {
                    include "content/home.php";
                }
            }
            ?>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('inc/footer.php'); ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script> -->
    <script>
        $('#id_service').change(function() {
            let id_service = $(this).val();
            $.ajax({
                url: 'get-service.php?id_service=' + id_service,
                method: "get",
                dataType: "json",
                success: function(res) {
                    $('#service_price').val(res.data.service_price);

                }
            })
        });

        $('.add-row').click(function() {
            let service_name = $('#id_service').find("option:selected").text();
            let service_price = $('#service_price').val();
            let newRow = ""
            newRow += "<tr>"
            newRow += `<td> ${service_name} </td>`
            newRow += `<td> ${service_price.toLocaleString()} </td>`
            newRow += "<td><input class='form-control' name='qty[]' type='number'></td>"
            newRow += "<td><input class='form-control' name='notes[]' type='text'></td>"
            newRow += "<td><button type='button' class='btn btn-danger btn-sm remove'>Remove</button></td>";
            newRow += "</tr>"

            $('.table-order tbody').append(newRow);

            $('.remove').click(function(event) {
                event.preventDefault();
                $(this).closest('tr').remove();
            });
        });
    </script>

</body>

</html>