<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<p class="m-0 text-white">サイトへのご意見・ご感想や、掲載したいツイートのリクエストお待ちしております。自薦・他薦問いませんのでお気軽にどうぞ！</p>
				<?php
				echo do_shortcode( '[contact-form-7 id="34" title="リクエストフォーム"]' );
				?>
			</div>
			<div class="col-12 col-md-6">
				<p class="m-0 text-center text-white">Copyright &copy; <?php bloginfo( 'name' ); ?> 2018</p>
				<p class="m-0 text-center text-white">by <a href="https://twitter.com/kifulog" target="_blank">きふろぐ</a>
				</p>
			</div>
		</div>
	</div>
	<!-- /.container -->
</footer>

<?php wp_footer(); ?>
</body>

</html>
