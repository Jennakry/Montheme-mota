<div class="filters swiper-container hidden">
    <div class="filter">
        <?php
        wp_dropdown_categories(array(
            'show_option_none' => 'Catégories',
            'option_none_value' => 'default-category',
            'taxonomy'         => 'categories-photos',
            'name'             => 'categories-photos',
            'id'               => 'filter-category',
            'class'            => 'filter-category',
            'hide_empty'       => false,
            'value_field'      => 'slug'

        ));
        ?>
        <i class="i-chevron-down"></i>
    </div>
    <div class="filter">
        <?php
        wp_dropdown_categories(array(
            'show_option_none' => 'Formats',
            'option_none_value' => 'default-format',
            'taxonomy'         => 'formats',
            'name'             => 'formats',
            'id'               => 'filter-format',
            'class'            => 'filter-format',
            'hide_empty'       => false,
            'value_field'      => 'slug'
        ));
        ?>
        <i class="i-chevron-down"></i>
    </div>
    <div class="filter">
        <select name="tri" id="filter-tri" class="filter-tri">
            <option value="default-tri">Trier par</option>
            <option value="new">Plus récent</option>
            <option value="old">Plus ancien</option>
        </select>
        <i class="i-chevron-down"></i>
    </div>
</div>