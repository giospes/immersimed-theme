<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: " . get_permalink(get_option('page_for_posts')));
exit();
?>


