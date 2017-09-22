<?php foreach($catalogue_group as $id => $value_catalogue): ?>
    <optgroup label="<?php echo $value_catalogue['name_catalogue'] ?>" value="<?php echo $value_catalogue['id'] ?>">  
        <?php foreach ($category as $key => $value): ?>
            <?php if ($value_catalogue['id'] == $value['id'] and $value['id_father_category'] == 0): ?>
                <option value="<?php echo $value['id_category'] ?>">&nbsp&nbsp<?php echo $value['name_category'] ?></option>
                
                <?php foreach ($category as $key_item1 => $item1): ?>
                    <?php if ($item1['id_father_category'] == $value['id_category']): ?>
                        <option value="<?php echo $item1['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item1['name_category'] ?></option>
                        
                        <?php foreach ($category as $key_item2 => $item2): ?>
                            <?php if ($item2['id_father_category'] == $item1['id_category']): ?>
                                <option value="<?php echo $item2['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item2['name_category'] ?></option>
                                
                                <!-- Generador de item de categorías -->

                                <?php foreach ($category as $key_item3 => $item3): ?>
                                    <?php if ($item3['id_father_category'] == $item2['id_category']): ?>
                                        <option value="<?php echo $item3['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item3['name_category'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>

                            <?php endif ?>
                        <?php endforeach ?>

                    <?php endif ?>
                <?php endforeach ?>

            <?php endif ?>
        <?php endforeach ?>
    </optgroup>
<?php endforeach; ?>