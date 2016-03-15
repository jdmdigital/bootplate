<form name="searchform" id="searchform" class="form" method="get" action="<?php echo esc_url( home_url() ); ?>">
	<div class="input-group input-group-lg">
		<input type="search" class="form-control" name="s" placeholder="Search..." value="<?php the_search_query(); ?>" required>
		<span class="input-group-btn">
			<button class="btn btn-primary" type="submit"><span class="bp-search"></span></button>
		</span>
	</div>
</form>