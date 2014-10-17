<?php
/*
  Plugin Name: upload_max_file_size
  Description: increase, upload, limit, up to, 250Mb
  Author:Ashutosh Kumar
  Plugin URI: https://www.facebook.com/ashutosh.kr.upadhyay
 */
add_action('admin_menu', 'mt_add_pages');
function mt_add_pages() {
   add_menu_page(__('upload_max_file_size','menu-test'), __('max_file_size','menu-test'), 'manage_options', 'upload_max_file_size', 'upload_max_file_size' );
}
function upload_max_file_size() {
    echo "<h2>" . __('Increase Upload Maximum File Size', 'menu-test') . "</h2>";
    ?>
    <form method="post">
        <input type="text" id="color" name="color" value="<?php echo get_option('max_file_size'); ?>"/>
        
            
        <input type="submit" name="submit" value="submit">
        <br/>(Example: Like 262144000 bytes = 250MB )
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $color = $_POST['color'];
        update_option('max_file_size', $color);
        //redirect on plugin dashboard page
        echo "<script>window.location='" . $_SERVER["REQUEST_URI"] . "'</script>";
    }
}
add_filter('upload_size_limit', 'ashu_increase_upload');
function ashu_increase_upload($bytes) {
return get_option('max_file_size'); 
}
?>
