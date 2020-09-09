<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        $('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="images/preloader.gif" /></div>');

        $('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo url('assets/images/preloader.gif');?>" /></div>');
        // LOADING THE AJAX MODAL
        $('#modal_ajax').modal('show', {backdrop: 'true'});
        // Scroll to top
        window.scrollTo(0, 0);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $website_title??'';?></h4>
            </div>

            <div class="modal-body" style="overflow:auto;">



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    function confirm_modal(delete_url, modal_type='none')
    {
        // Scroll to top
        window.scrollTo(0, 0);
        if (modal_type === 'generic_confirmation') {
            jQuery('#modal-generic_confirmation').modal('show', {backdrop: 'static'});
            document.getElementById('update_link').setAttribute('action' , delete_url);
        }
        else{
            jQuery('#modal-4').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('action' , delete_url);
        }
    }
</script>

<!-- (Normal Modal)-->
<form action="#" id="delete_link" method="post">
    @csrf
    @method('delete')
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            </div>


            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <button class="btn btn-danger" type="submit">Delete</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- (generic_confirmation Modal)-->
<form action="#" id="update_link" method="post">
    @csrf
    @method('put')
<div class="modal fade" id="modal-generic_confirmation">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to update this information ?</h4>
            </div>


            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <button class="btn btn-danger" type="submit">Yes</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
</form>
