<?php $this['scripts']->queue('dashboard-settings', 'extensions/system/modules/dashboard/app/settings.js', ['vue-system']) ?>

<div id="dashboard" class="uk-form">

   <?php $this['sections']->start('toolbar', 'show') ?>

        <div class="uk-button-dropdown" data-uk-dropdown="{ mode: 'click' }">
            <button class="uk-button uk-button-primary" type="button">{{ 'Add Widget' | trans }}</button>
            <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav uk-nav-dropdown">
                    <li v-repeat="type: types">
                        <a href="{{ $url('admin/system/dashboard/add', {type: type.id}) }}">{{ type.name }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <a class="uk-button pk-button-danger" v-show="selected.length" v-on="click: remove">{{ 'Delete' | trans }}</a>

    <?php $this['sections']->end() ?>

    <div class="pk-table-fake pk-table-fake-header pk-table-fake-header-indent">
        <div class="pk-table-width-minimum"><input type="checkbox" v-check-all="selected: input[name=id]"></div>
        <div>{{ 'Widget' | trans }}</div>
        <div class="pk-table-width-100">{{ 'Type' | trans }}</div>
    </div>

    <ul class="uk-nestable" data-uk-nestable="{ maxDepth: 1 }">
        <li v-repeat="widget: widgets">
            <div class="uk-nestable-item pk-table-fake">
                <div class="pk-table-width-minimum"><div class="uk-nestable-handle">​</div></div>
                <div class="pk-table-width-minimum"><input type="checkbox" name="id" value="{{ $key }}"></div>
                <div><a href="{{ $url('admin/system/dashboard/edit', {id: $key}) }}">{{ widget.title }}</a></div>
                <div class="pk-table-width-100">{{ types[widget.type].name }}</div>
            </div>
        </li>
    </ul>

</div>