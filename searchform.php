<div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 350px;">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="form-control border-1" style=" border-radius: 5px;" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'school-education' ); ?>" value="<?php echo get_search_query(); ?>" name="s" type="search">
    </form>
    <div class="input-group-append">
        <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
    </div>
</div>
