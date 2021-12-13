<div class="customize-control customize-control-checkbox customize-control-checkbox_dummy" id="customize-control-<?php echo $control['dummy_id']; ?>">
	<div class="customize-inside-control-row" data-pointer-target>
		<input type="checkbox" />
		<label>
			<span><?php echo $control['label']; ?></span> 
			<?php if ( isset( $control['tooltip'] ) ) : ?><i class="fa fa-question-circle" aria-hidden="true" data-pointer><span><?php echo $control['tooltip']; ?></span></i><?php endif; ?>
		</label>
		<span class="members-only"><?php _e( 'Members Only', 'happyforms') ?></span>
	</div>
</div>