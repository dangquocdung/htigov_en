var Botble = Botble || {};

Botble.showNotice = function (messageType, message, messageHeader) {
    toastr.clear();

    toastr.options = {
        closeButton: true,
        positionClass: 'toast-bottom-right',
        onclick: null,
        showDuration: 1000,
        hideDuration: 1000,
        timeOut: 10000,
        extendedTimeOut: 1000,
        showEasing: 'swing',
        hideEasing: 'linear',
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut'

    };
    toastr[messageType](message, messageHeader);
};

Botble.handleError = function (data) {
    if (typeof (data.responseJSON) !== 'undefined') {
        if (typeof (data.responseJSON.message) !== 'undefined') {
            Botble.showNotice('error', data.responseJSON.message, Botble.languages.notices_msg.error);
        } else {
            $.each(data.responseJSON, function (index, el) {
                $.each(el, function (key, item) {
                    Botble.showNotice('error', item, Botble.languages.notices_msg.error);
                });
            });
        }
    } else {
        Botble.showNotice('error', data.statusText, Botble.languages.notices_msg.error);
    }
};

Botble.countCharacter = function () {
    $.fn.charCounter = function (max, settings) {
        max = max || 100;
        settings = $.extend({
            container: '<span></span>',
            classname: 'charcounter',
            format: '(%1 ' + Botble.languages.system.character_remain + ')',
            pulse: true,
            delay: 0
        }, settings);
        var p, timeout;

        function count(el, container) {
            el = $(el);
            if (el.val().length > max) {
                el.val(el.val().substring(0, max));
                if (settings.pulse && !p) {
                    pulse(container, true);
                }
            }
            if (settings.delay > 0) {
                if (timeout) {
                    window.clearTimeout(timeout);
                }
                timeout = window.setTimeout(function () {
                    container.html(settings.format.replace(/%1/, (max - el.val().length)));
                }, settings.delay);
            } else {
                container.html(settings.format.replace(/%1/, (max - el.val().length)));
            }
        }

        function pulse(el, again) {
            if (p) {
                window.clearTimeout(p);
                p = null;
            }
            el.animate({
                opacity: 0.1
            }, 100, function () {
                $(this).animate({
                    opacity: 1.0
                }, 100);
            });
            if (again) {
                p = window.setTimeout(function () {
                    pulse(el)
                }, 200);
            }
        }

        return this.each(function () {
            var container;
            if (!settings.container.match(/^<.+>$/)) {
                // use existing element to hold counter message
                container = $(settings.container);
            } else {
                // append element to hold counter message (clean up old element first)
                $(this).next("." + settings.classname).remove();
                container = $(settings.container)
                    .insertAfter(this)
                    .addClass(settings.classname);
            }
            $(this)
                .unbind('.charCounter')
                .bind('keydown.charCounter', function () {
                    count(this, container);
                })
                .bind('keypress.charCounter', function () {
                    count(this, container);
                })
                .bind('keyup.charCounter', function () {
                    count(this, container);
                })
                .bind('focus.charCounter', function () {
                    count(this, container);
                })
                .bind('mouseover.charCounter', function () {
                    count(this, container);
                })
                .bind('mouseout.charCounter', function () {
                    count(this, container);
                })
                .bind('paste.charCounter', function () {
                    var me = this;
                    setTimeout(function () {
                        count(me, container);
                    }, 10);
                });
            if (this.addEventListener) {
                this.addEventListener('input', function () {
                    count(this, container);
                }, false);
            }
            count(this, container);
        });
    };

    $(document).on('click', 'input[data-counter], textarea[data-counter]', function () {
        $(this).charCounter($(this).data('counter'), {
            container: '<small></small>'
        });
    });
};

Botble.initCheckBox = function () {
    $('input[type="checkbox"].input-checkbox-minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });

    $('.input-checkbox-all').on('ifChecked', function (event) {
        event.preventDefault();
        $('input[type="checkbox"].input-checkbox-minimal').iCheck('check');
    }).on('ifUnchecked', function (event) {
        event.preventDefault();
        $('input[type="checkbox"].input-checkbox-minimal').iCheck('uncheck');
    });
};

Botble.securitySetup = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
};

Botble.handleBackup = function () {
    var table_backup = $('#table-backups');

    $('.btn-delete-selected-items').on('click', function (event) {
        event.preventDefault();
        $.fancybox.open({
            src: '.modal-confirm-delete',
            type: 'inline'
        });
    });

    $(document).on('click', '.btn-confirm-delete-backups', function () {
        var items = table_backup.closest('form').serializeArray();
        var ids = [];
        $.each(items, function (index, item) {
            ids.push(item.value);
        });

        event.preventDefault();
        var _self = $(this);
        _self.html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> ' + _self.text());

        $.ajax({
            url: _self.data('url'),
            type: 'DELETE',
            data: {
                ids: ids
            },
            success: function (res) {
                _self.find('i').remove();
                _self.closest('.modal-footer').find('a').trigger('click');

                if (res.error) {
                    Botble.showNotice('error', res.message, Botble.languages.notices_msg.error);
                } else {
                    table_backup.find('tbody').html(res.data);
                    Botble.initCheckBox();
                    $('.input-checkbox-all').iCheck('uncheck');
                    $('.btn-delete-selected-items').addClass('hidden');
                    Botble.showNotice('success', res.message, Botble.languages.notices_msg.success);
                }
            },
            error: function (data) {
                _self.find('i').remove();
                Botble.handleError(data);
            }
        });
    });

    $(document).on('click', '.btn-confirm-delete-backup', function () {
        event.preventDefault();
        var _self = $(this);
        _self.html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> ' + _self.text());

        $.ajax({
            url: _self.data('url'),
            type: 'DELETE',
            success: function (res) {
                _self.find('i').remove();
                _self.closest('.modal-footer').find('a').trigger('click');

                if (res.error) {
                    Botble.showNotice('error', res.message, Botble.languages.notices_msg.error);
                } else {
                    table_backup.find('tbody').html(res.data);
                    Botble.initCheckBox();
                    Botble.showNotice('success', res.message, Botble.languages.notices_msg.success);
                }
            },
            error: function (data) {
                _self.find('i').remove();
                Botble.handleError(data);
            }
        });
    });

    $(document).on('click', '.btn-confirm-restore-backup', function (event) {
        event.preventDefault();
        var _self = $(this);
        _self.html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> ' + _self.text());

        $.ajax({
            url: _self.data('url'),
            type: 'POST',
            success: function (data) {
                _self.find('i').remove();
                _self.closest('.modal-footer').find('a').trigger('click');

                if (data.error) {
                    Botble.showNotice('error', data.message, Botble.languages.notices_msg.error);
                } else {
                    Botble.showNotice('success', data.message, Botble.languages.notices_msg.success);
                }
            },
            error: function (data) {
                _self.find('i').remove();
                Botble.handleError(data);
            }
        });
    });

    $(document).on('click', '.backup-button-submit', function (event) {
        event.preventDefault();
        var _self = $(this);
        _self.html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> ' + _self.text());

        var name = $('#name').val();
        var description = $('#description').val();
        var error = false;
        if (name === '' || name === null) {
            error = true;
            Botble.showNotice('error', 'Backup name is required!', Botble.languages.notices_msg.error);
        }
        if (description === '' || description === null) {
            error = true;
            Botble.showNotice('error', 'Backup description is required!', Botble.languages.notices_msg.error);
        }

        if (!error) {
            $.ajax({
                url: _self.data('url'),
                type: 'POST',
                data: {
                    name: name,
                    description: description
                },
                success: function (res) {
                    _self.find('i').remove();
                    _self.closest('.modal-footer').find('a').trigger('click');

                    if (res.error) {
                        Botble.showNotice('error', res.message, Botble.languages.notices_msg.error);
                    } else {
                        table_backup.find('tbody').html(res.data);
                        Botble.initCheckBox();
                        Botble.showNotice('success', res.message, Botble.languages.notices_msg.success);
                    }
                },
                error: function (data) {
                    _self.find('i').remove();
                    Botble.handleError(data);
                }
            });
        } else {
            _self.find('i').remove();
        }
    });

    $(document).on('ifChecked', '.input-checkbox-minimal', function (event) {
        event.preventDefault();
        $('.btn-delete-selected-items').removeClass('hidden');
    }).on('ifUnchecked', '.input-checkbox-minimal',function (event) {
        event.preventDefault();
        $('.btn-delete-selected-items').addClass('hidden');
    });
};

$(document).ready(function () {
    Botble.securitySetup();
    Botble.initCheckBox();
    Botble.handleBackup();
});