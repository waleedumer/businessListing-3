<?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>

<div class="col-sm-offset-1 col-sm-10">
    <div class="form-group">
        <?php foreach($days as $day): ?>
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-lg-6">
                <label><?php echo ucwords($day.' opening'); ?></label>
                <select class="form-control selectboxit" name="<?php echo $day.' opening'; ?>" id="<?php echo $day.' opening'; ?>">
                    <option value="closed">Closed</option>
                    <?php for($i = 0; $i < 24; $i++): ?>
                    <option value="<?php echo $i; ?>"> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-6">
                <label><?php echo ucwords($day.' closing'); ?></label>
                <select class="form-control selectboxit" name="<?php echo $day.' closing'; ?>" id="<?php echo $day.' closing'; ?>">
                    <option value="closed">Closed</option>
                    <?php for($i = 0; $i < 24; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
