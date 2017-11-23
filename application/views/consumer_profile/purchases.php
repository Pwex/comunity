<section class="content">
    <table class="table table-responsive table-bordered table-hover" id="table-default">
        <thead>
            <th>Fecha</th>
            <th>Cliente</th>  
            <th>Total</th>
        </thead>
        <tfoot>
            <th>Fecha</th>
            <th>Cliente</th>  
            <th>Total</th>
        </tfoot>
        <tbody>
            <?php foreach ($listing_purchases as $key => $value): ?>
                <tr>
                    <td>
                        <?php echo date('d-m-Y', strtotime($value['date'])) ?>
                    </td>
                    <td>
                        <?php echo $value['name'].' '.$value['second_name'] ?>
                    </td>
                    <td>
                        <?php echo number_format($value['total_price'], 0, ',', '.').' '.$value['coin'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>