import './bootstrap';
import 'preline';

import Alpine from 'alpinejs';
import collapse from "@alpinejs/collapse";
import anchor from "@alpinejs/anchor";

window.Alpine = Alpine;
document.addEventListener(
    "alpine:init",
    () => {
        const modules = import.meta.glob("./plugins/**/*.js", {eager: true});

        for (const path in modules) {
            window.Alpine.plugin(modules[path].default);
        }
        window.Alpine.plugin(collapse);
        window.Alpine.plugin(anchor);
    },
    {once: true},
);

window.addEventListener('load', () => {

    const inputs = document.querySelectorAll('.dt-container thead input');

    inputs.forEach((input) => {
        input.addEventListener('keydown', function (evt) {
            if ((evt.metaKey || evt.ctrlKey) && evt.key === 'a') this.select();
        });
    });
});


import {HSDataTable, HSSelect} from "preline";

window.addEventListener('load', () => {
    (function () {
        /* Data Table */
        const {dataTable} = new HSDataTable('#hs-datatable-with-export');
        const buttons = document.querySelectorAll('#hs-dropdown-datatable-with-export .hs-dropdown-menu button');

        /* Data Table - Selection */
        dataTable.on('select', function (e, dt, type, indexes) {
            console.log(indexes)
            if (type === 'row') {
                var data = dataTable
                    .rows(indexes)
                    .data()
                    .pluck('id');
                console.log(data)
            }
        });

        /* Data Table - Export */
        buttons.forEach((btn) => {
            const type = btn.getAttribute('data-hs-datatable-action-type');
            btn.addEventListener('click', () => dataTable.button(`.buttons-${type}`).trigger());
        });

        /* Data Table - Hide Column */
        const select = HSSelect.getInstance('#hs-datatable-with-hidden-columns-select', true);

        select.element.on('change', (indices) => {
            dataTable.columns().every(function (index) {
                const column = this;

                if (indices.includes(index.toString())) column.visible(false);
                else column.visible(true);
            });
        });

    })();
});



