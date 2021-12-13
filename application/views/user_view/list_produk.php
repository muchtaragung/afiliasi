<?php $this->load->view('user_view/template/header'); ?>

<body>
    <style>
        #home thead {
            display: none;
        }

        #home tr:hover {
            background-color: lightblue;
            transform: scale(1.1);
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
                    <h5 class="text-center">Produk <b>Affiliasi</b></h5>
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
                            <?php
                            $no = 1;
                            foreach ($data_produk as $data) : ?>
                                <tr class='clickable-row' data-href='<?= base_url() ?><?= $data->slug_aff ?>/produk/<?= $data->slug_produk; ?>'>
                                    <td><img width="80px" src="<?= base_url() ?>assets/images/produk/bg-payment.jpg"></td>
                                    <td class="text-center"><?= $data->nama_produk ?></td>
                                    <td class="text-right"><span class="badge badge-pill badge-success">IDR <?= number_format($data->price, 0, ",", "."); ?></span></td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <?php $this->load->view('user_view/template/script'); ?>

</body>

</html>