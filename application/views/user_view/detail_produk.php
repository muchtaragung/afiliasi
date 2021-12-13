<?php $this->load->view('template/header'); ?>

<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="card-body">
					<img class="img-fluid mb-3" src="<?= base_url() ?>assets/images/produk/bg-payment.jpg" alt="" srcset="">
					<div class="row mb-3">
						<div class="col-lg-12 col-12">
							<h4 class="text-center"><b><?= $detail_produk->nama_produk ?></b></h4>
						</div>
					</div>
					<button class="btn btn-outline-primary btn-block mt-3" style="margin-bottom: 5%;" data-toggle="modal" data-target="#showDeskripsi<?= $detail_produk->id_produk ?>">Deskripsi produk</button>
					<div class="row mt-3">
						<div class="col-lg-6 col-6">
							<h6>Nama Afiliasi</h6>
						</div>
						<div class="col-lg-6 col-6">
							<h6 class="float-right"><?= $detail_produk->name ?></h6>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-lg-6 col-6">
							<h6>Lama Akses</h6>
						</div>
						<div class="col-lg-6 col-6">
							<h6 class="float-right"><?= $detail_produk->lama_akses ?></h6>
						</div>
					</div>
					<hr style="border-top: 2px dotted black" />
					<div class="row mt-3">
						<div class="col-lg-6 col-6">
							<h6><b>Harga</b></h6>
						</div>
						<div class="col-lg-6 col-6">
							<h6 class="float-right"><b>Rp. <?php echo number_format($detail_produk->price, 0, ",", "."); ?></b></h6>
						</div>
					</div>
				</div>
			</div>
			<form id="form" class="contact100-form validate-form mt-5">
				<div class="wrap-input100 validate-input" data-validate="Nama belakang dibutuhkan">
					<span class="label-input100">Nama Lengkap</span>
					<input class="input100" type="text" name="name" id="name" required placeholder="Masukan Nama Anda">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Email yang valid dibutuhkan: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" required id="email" placeholder="Masukan Email Anda">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Nomer telepon/WhatsApp">
					<span class="label-input100">Nomor Telpon/WhatsApp</span>
					<input type="text" name="notelp" class="input100" id="notelp" required onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="0812123456789">
					<span class="focus-input100"></span>
				</div>
				<!-- hidden -->
				<input type="hidden" name="paymentAmount" id="paymentAmount" value="<?= $detail_produk->price ?>">
				<input type="hidden" name="productDetail" id="productDetail" value="<?= $detail_produk->nama_produk ?>">

				<div class="container-contact100-form-btn mt-4">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="button" id="submit" onClick="pay();" class="contact100-form-btn">
							<span>
								Pay
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<div class="modal fade" id="showDeskripsi<?= $detail_produk->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= nl2br($detail_produk->description); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('template/script'); ?>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- <script>
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '<?= base_url() ?>';
			}
		})
	</script> -->
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
							Swal.fire({
								// title: 'Are you sure?',
								text: "Pesanan berhasil dilakukan, Silahkan lakukan pembayaran. Untuk lebih lengkap silahkan cek email anda",
								icon: 'success',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Menu utama'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.href = '<?= base_url() ?>';
								}
							})
							// tambahkan fungsi sesuai kebutuhan anda
							// console.log('pending');
							// console.log(result);
							// alert('Payment Pending');
						},
						errorEvent: function(result) {
							// tambahkan fungsi sesuai kebutuhan anda
							console.log('error');
							console.log(result);
							alert('Payment Error');
						},
						// closeEvent: function(result) {
						// Swal.fire({
						// title: 'Are you sure?',
						// text: "customer closed the popup without finishing the payment",
						// icon: 'warning',
						// showCancelButton: false,
						// confirmButtonColor: '#3085d6',
						// cancelButtonColor: '#d33',
						// confirmButtonText: 'Yes, delete it!'
						// })
						// tambahkan fungsi sesuai kebutuhan anda
						// console.log('customer closed the popup without finishing the payment');
						// console.log(result);
						// alert('customer closed the popup without finishing the payment');
						// }
					});

				},
			});

		}
	</script>
</body>

</html>