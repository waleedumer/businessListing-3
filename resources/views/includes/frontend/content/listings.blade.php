<?php

$listings_view = session('listings_view');
session(['listings_view'=>'grid_view']);
$listings_view=session('listings_view');
//dd($listings_view);
//dd(session('listings_view'))
if($listings_view == 'list_view'){
    session(['listings_view'=>'list_view']);
}else{
    session(['listings_view'=>'grid_view']);
}
?>
@include ('includes.frontend.content.listings_'.session('listings_view'));
<?php

$all_json_files = glob('frontend/all-listings-geojson/*');
foreach($all_json_files as $all_json_file){ // iterate files
    if(is_file($all_json_file))
        $json_file_for_this_page = $all_json_file;
}

?>

<script>
    createListingsMap({
        mapId: 'map',
        jsonFile: '<?php echo url($json_file_for_this_page ?? ''); ?>'
    });
</script>
