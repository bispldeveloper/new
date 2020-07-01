// expand collapse
$(document).on('click', '.expand-collapse', function (event) {
    event.preventDefault();
    $(this).toggleClass('collapsed');
    $(this).parent().parent().find('.content').stop().slideToggle();
});

// trigger reveal
$(document).on('click', '.trigger-reveal', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    $.ajax(url).done(function (content) {
        $('#dynamicModal').html(content).foundation('open');
    });
});

// nav active
$("ul.sub-menu li a").each(function (index, element) {
    if ($(this).hasClass("active")) {
        $(this).parents("li.has-submenu").addClass("active");
        $(this).parents('ul.sub-menu').css("display", "block");
    }
});

// filter function
$(function () {
    $('#filter').change(function () {
        var filter = $(this).val();
        if (filter == '') {
            window.location.href = '';
        } else {
            window.location.href = '?filter=' + filter;
        }
    })
});

// select2 helper
$(document).ready(function () {
    initialiseSearchables();
});

$(document).on('open.zf.reveal', initialiseSearchables);

function initialiseSearchables() {
    var select = $('.searchable');
    select.each(function(k, i) {
        var id = k;
        $($(i)).wrap('<div id="select-' + id + '" class="searchable-container"></div>');
        var settings = {
            dropdownParent: $('#select-' + id),
            cache: true,
            width: '100%'
        }

        if($(i).hasClass('taggable')) {
            settings.tags = true;
        }
        if($(i).hasClass('clearable')) {
            settings.allowClear = true;
            settings.placeholder = true;
        }

        if($($(i)).attr('action')) {
            settings.minimumInputLength = 2,
                settings.ajax = {
                    url: $(i).attr('action'),
                    dataType: 'json',
                    method: 'post',
                    delay: 200,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function (params) {
                        var query = {
                            terms: params.term,
                            type: 'public',
                            activeOnly: true
                        }
                        return query;
                    },
                    processResults: function (data, params) {
                        return {
                            results: $.map(data, function (obj) {
                                return {id: obj.value, text: obj.label, data: obj.data};
                            })
                        };
                    }
                }
        }
        $($(i)).select2(settings);
    });
}

$(document).on('select2:select', '.select-submit', function(e) {
    $(this).closest('form').submit();
});