<?php

// All partials are located in the lib file.
// Please try and keep all code aside from partial imports out of this functions file.

/* Enqueued styles and scripts
-------------------------------------------------------------- */
require_once( get_template_directory() . '/lib/enqueued/enqueue-styles.php' );
require_once( get_template_directory() . '/lib/enqueued/enqueue-scripts.php' );

/* Theme support & options
-------------------------------------------------------------- */
require_once( get_template_directory() . '/lib/functions/theme-support.php' );
require_once( get_template_directory() . '/lib/functions/theme-options.php' );
