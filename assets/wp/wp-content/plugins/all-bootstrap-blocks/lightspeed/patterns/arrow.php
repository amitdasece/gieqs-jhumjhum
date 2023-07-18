<?php $pattern_style = 'fill="' . $pattern_color . '" style="opacity: 0.25;"'; ?>
<div class="areoi-background-pattern">
	<div class="h-100">
		<div class="row h-100">

			<?php if ( $pattern_align == 'start' ) : ?>
				<div class="col position-relative">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  110%; height:  auto; display:  block; top: 40%; left: -30%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="50.9,1.6 12.1,1.6 0.7,13 37.6,50 0.7,87 12.1,98.4 50.9,98.4 99.3,50 "/>	
					</svg>

					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  100%; height:  auto; display:  block; top: 0%; right: 0%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="50.9,1.6 12.1,1.6 0.7,13 37.6,50 0.7,87 12.1,98.4 50.9,98.4 99.3,50 "/>	
					</svg>
				</div>
				<div class="col"></div>
			<?php else : ?>
				<div class="col"></div>
				<div class="col position-relative">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  110%; height:  auto; display:  block; bottom: 40%; right: -30%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="50.9,1.6 12.1,1.6 0.7,13 37.6,50 0.7,87 12.1,98.4 50.9,98.4 99.3,50 "/>
					</svg>
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  110%; height:  auto; display:  block; bottom: 0%; right: 10%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="50.9,1.6 12.1,1.6 0.7,13 37.6,50 0.7,87 12.1,98.4 50.9,98.4 99.3,50 "/>
					</svg>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>