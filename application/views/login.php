<?php $this->load->view('template/header'); ?>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <span class="contact100-form-title" style="font-size: 30px;">
                <img style="height: 30px; margin-right:10px;" src="<?= base_url() ?>assets/images/logo.png" class="img-fluid" alt="" srcset="">
                Login User Affiliasi Payment
            </span>
            <div class="row mb-3">
                <div class="col-lg-12 col-12">
                    <p class="text-center">Silahkan login untuk memulai sesi Anda</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif ?>
                    <form id="form" method="POST" action="<?= base_url() ?>auth/user_auth" class="contact100-form validate-form mt-5">
                        <div class="wrap-input100 validate-input" data-validate="Email yang valid dibutuhkan: ex@abc.xyz">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" required id="email" placeholder="Masukan Email Anda">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password Dibutuhkan">
                            <span class="label-input100">Password</span>
                            <input type="password" name="password" class="input100" id="password" required placeholder="Masukan Password Anda">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="container-contact100-form-btn mt-4">
                            <div class="wrap-contact100-form-btn">
                                <div class="contact100-form-bgbtn"></div>
                                <button type="submit" id="submit" class="contact100-form-btn">
                                    <span>
                                        Login
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
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
    <?php $this->load->view('template/script'); ?>

</body>

</html>