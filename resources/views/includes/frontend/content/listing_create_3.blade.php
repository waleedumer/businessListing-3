<?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>


    <table class="table table-condensed">
        <thead>
            <tr>
                <th><b>Day</b></th>
                <th><b>Opening</b></th>
                <th><b>Closing</b></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($days as $day): ?>
            <tr>
                <td class="align-middle"><b><?php echo ucwords($day); ?></b></td>
                <td class="align-middle">
                    <label class="hidden"><?php echo ucwords($day.' opening'); ?></label>
                    <select class="form-control selectboxit" name="<?php echo $day.' opening'; ?>" id="<?php echo $day.' opening'; ?>">
                        <option value="closed">Closed</option>
                        <?php for($i = 0; $i < 24; $i++): ?>
                        <option value="<?php echo $i; ?>"> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td class="align-middle">
                    <label class="hidden"><?php echo ucwords($day.' closing'); ?></label>
                    <select class="form-control selectboxit" name="<?php echo $day.' closing'; ?>" id="<?php echo $day.' closing'; ?>">
                        <option value="closed">Closed</option>
                        <?php for($i = 0; $i < 24; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <style>
        table.table.table-condensed td {
            padding: 0.3rem;
        }
    </style>
