<?php $pattern_style = 'fill="' . $pattern_color . '" style="opacity: 0.25;"'; ?>
<div class="areoi-background-pattern">
	<div class="h-100">
		<div class="row h-100">

			<?php if ( $pattern_align == 'start' ) : ?>
				<div class="col position-relative">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  130%; height:  auto; display:  block; top: -10%; left: -30%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="38.4,87.5 65.4,43.8 67.3,40.7 38.4,58.5 61,22 50.1,0.1 25.1,50.1 0.2,100 50.1,100 100,100 80.7,61.4 	"/>
					</svg>
				</div>
				<div class="col"></div>
			<?php else : ?>
				<div class="col"></div>
				<div class="col position-relative">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100; position: absolute; width:  130%; height:  auto; display:  block; top: -10%; left: -30%;" xml:space="preserve">
						<polygon <?php echo $pattern_style ?> points="38.4,87.5 65.4,43.8 67.3,40.7 38.4,58.5 61,22 50.1,0.1 25.1,50.1 0.2,100 50.1,100 100,100 80.7,61.4 	"/>
					</svg>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>