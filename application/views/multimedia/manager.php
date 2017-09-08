<div class="container">
    <!-- Shuffle & Sort Controls -->
    <div class="row">
        <ul class="sortandshuffle">
            <!-- Basic shuffle control -->
            Buscar:
            <input type="text" class="filtr-search" name="filtr-search" data-search>
            <select data-sortOrder class="filtr-search" style="padding: 0.4em; height: 34px">
                <option value="domIndex">
                    Posición
                </option>
                <option value="sortData">
                    Descripción
                </option>
            </select>
            <!-- Basic sort controls consisting of asc/desc button and a select -->
            <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="sort-btn active" data-sortAsc>Asc</li>
            <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="sort-btn" data-sortDesc>Desc</li>
            <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="shuffle-btn" data-shuffle>Aleatorio</li>
        </ul>
    </div>
    <div class="row">
        <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
            attribute, which starts from the value 1 and goes up from there -->
        <div class="filtr-container">
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="Busy streets">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/city_1.jpg') ?>" alt="sample image">
                <span class="item-desc">Busy Streets</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 5" data-sort="Luminous night">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/nature_2.jpg') ?>" alt="sample image">
                <span class="item-desc">Luminous night</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 4" data-sort="City wonders">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/city_3.jpg') ?>" alt="sample image">
                <span class="item-desc">city wonders</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="In production">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/industrial_1.jpg') ?>" alt="sample image">
                <span class="item-desc">in production</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3, 4" data-sort="Industrial site">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/industrial_2.jpg') ?>" alt="sample image">
                <span class="item-desc">industrial site</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Peaceful lake">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/nature_1.jpg') ?>" alt="sample image">
                <span class="item-desc">peaceful lake</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="City lights">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/city_2.jpg') ?>" alt="sample image">
                <span class="item-desc">city lights</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Dreamhouse">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/nature_3.jpg') ?>" alt="sample image">
                <span class="item-desc">dreamhouse</span>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="Restless machines">
                <img class="img-responsive" src="<?php echo base_url('assets/plugins/filterizr/img/industrial_3.jpg') ?>" alt="sample image">
                <span class="item-desc">restless machines</span>
            </div>
        </div>
    </div>
</div>