<?php dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row collapse">
		<div class="small-8 columns">
			<label class="show-for-sr" for="search">Search</label>
			<input type="text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="search" id="search" />
		</div>
		<div class="small-4 columns">
			<input type="submit" class="button expanded" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
		</div>
	</div>
</form>


