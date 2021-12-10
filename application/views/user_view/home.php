<?php $this->load->view('user_view/template/header'); ?>

<body>
    <style>
        #home thead {
            display: none;
        }

        #home tr:hover {
            background-color: yellow;
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
                    <p class="text-center">Selamat datang di<b> Affiliasi Payment</b><br>Untuk melanjutkan pembayaran silahkan pilih Affiliasi Anda </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <table id="home" class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $data) : ?>
                                <tr class='clickable-row' data-href='<?= base_url() ?><?= str_replace(' ', '-', strtolower($data->name)); ?>'>
                                    <td><?= $data->name ?></td>
                                    <td class="float-right"><?= $data->phone ?></td>
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