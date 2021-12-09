<?php $this->load->view('user_view/template/header'); ?>

<body>
    <style>
        #home thead {
            display: none;
        }
    </style>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <span class="contact100-form-title" style="font-size: 30px;">
                <img style="height: 30px; margin-right:10px;" src="<?= base_url() ?>assets/images/logo.png" class="img-fluid" alt="" srcset="">
                Affiliasi Payment
            </span>
            <div class="row mb-3">
                <div class="col-lg-12 col-12">
                    <p class="text-center">Selamat datang di<b> Affiliasi Payment</b><br>Untuk melanjutkan pembayaran silahkan pilih Afiliasi Anda </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <table id="home" class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="<?= base_url() ?><?= str_replace(' ', '-', strtolower('Muchtara')); ?>">
                                        Muchtara
                                    </a></td>
                                <td class="float-right">085217116035</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <div class="modal fade" id="showDeskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= nl2br('testing hehe'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function pay() {
            // $('#form').validate();
            var amount = document.getElementById("paymentAmount").value;
            var productDetail = document.getElementById("productDetail").value;
            var email = document.getElementById("email").value;
            var phoneNumber = document.getElementById("notelp").value;
            // var first_name = document.getElementById("first_name").value;
            var name = document.getElementById("name").value;
            var paymentUi = "1";
            $.ajax({
                type: "POST",
                data: {
                    paymentAmount: amount,
                    productDetail: productDetail,
                    email: email,
                    phoneNumber: phoneNumber,
                    name: name
                },
                url: '<?= base_url() ?>transaksi/duitku',
                dataType: "json",
                cache: false,
                success: function(result) {
                    console.log(result.reference);
                    console.log(result);

                    if (paymentUi === "2") { // user redirect payment interface
                        window.location = result.paymentUrl;
                    }

                    checkout.process(result.reference, {
                        successEvent: function(result) {
                            // tambahkan fungsi sesuai kebutuhan anda
                            console.log('success');
                            console.log(result);
                            alert('Payment Success');
                        },
                        pendingEvent: function(result) {
                            // tambahkan fungsi sesuai kebutuhan anda
                            console.log('pending');
                            console.log(result);
                            alert('Payment Pending');
                        },
                        errorEvent: function(result) {
                            // tambahkan fungsi sesuai kebutuhan anda
                            console.log('error');
                            console.log(result);
                            alert('Payment Error');
                        },
                        closeEvent: function(result) {
                            // tambahkan fungsi sesuai kebutuhan anda
                            console.log('customer closed the popup without finishing the payment');
                            console.log(result);
                            alert('customer closed the popup without finishing the payment');
                        }
                    });

                },
            });

        }
    </script>
    <?php $this->load->view('user_view/template/script'); ?>

</body>

</html>