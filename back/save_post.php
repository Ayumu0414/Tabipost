if ($_POST['location_type'] === 'domestic') {
    $location = $_POST['location']; // 都道府県
} else {
    $location = $_POST['location_overseas']; // 海外の国名
}
