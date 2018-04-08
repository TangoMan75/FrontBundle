/*
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Reset button
 *
 * @author    Matthias Morin <matthias.morin@gmail.com>
 * @modified  16:00 12/10/2017
 * @version   1.0.0
 * @requires  jQuery
 */
$(function () {
    $('.tango-form button[type="reset"], .tango-form input[type="reset"]').click(function (e) {
        e.preventDefault();
        $('.tango-form').find('input:text, input:password, input[type="number"], select, textarea').val('');
        $('.tango-form').find('input:radio, input:checkbox').prop('checked', false);
        this.form.submit();
    });
});
