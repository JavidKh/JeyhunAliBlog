$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

    moment.updateLocale('en', {
        week: { dow: 1 } // Monday is the first day of the week
    })

    $('.date').datepicker();

    $('.datetime').datetimepicker({
        format: 'MM/DD/YYYY HH:mm:ss',
        locale: 'en',
        sideBySide: true,
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss',
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.select-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select2').select2()

    $('.treeview').each(function () {
        var shouldExpand = false
        $(this).find('li').each(function () {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })

    $('a[data-widget^="pushmenu"]').click(function () {
        setTimeout(function () {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }, 350);
    })

    $('.sortable').nestedSortable({
        forcePlaceholderSize: true,
        handle: 'div',
        helper: 'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        toleranceElement: '> div',
        maxLevels: 4,

        isTree: true,
        expandOnHover: 700,
        startCollapsed: false
    });

    $('.disclose').on('click', function () {
        $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
    });

    /******  Sortable Select ******/
    // Set up our dropzone
    $('#in_available_fields').sortable({
        connectWith: '.sortable-list',
        placeholder: 'placeholder',
        start: function (event, ui) {
            if (!$(ui.item).hasClass("allowPrimary")) {
                $(".primaryPanel").removeClass('panel-primary').addClass("panel-danger");
            }
            checkFields()
        },
        stop: function (event, ui) {
            if (!$(ui.item).hasClass("allowPrimary")) {
                $(".primaryPanel").removeClass("panel-danger").addClass('panel-primary');
            }
        },
        change: function (event, ui) {
            checkFields();
        },
        update: function (event, ui) {
            checkFields();
        },
        out: function (event, ui) {
            checkFields();
        }
    }).disableSelection();

    // Enable dropzone for primary fields
    $('.primaryDropzone').sortable({
        connectWith: '.sortable-list',
        placeholder: 'placeholder',
        receive: function (event, ui) {
            // If we dont allow primary fields here, cancel
            if (!$(ui.item).hasClass("allowPrimary")) {
                $(ui.placeholder).css('display', 'none');
                $(ui.sender).sortable("cancel");
            }
        },
        over: function (event, ui) {
            if (!$(ui.item).hasClass("allowPrimary")) {
                $(ui.placeholder).css('display', 'none');
            } else {
                $(ui.placeholder).css('display', '');
            }
        },
        start: function (event, ui) {
            checkFields()
        },
        change: function (event, ui) {
            checkFields();
        },
        update: function (event, ui) {
            checkFields();
        },
        out: function (event, ui) {
            checkFields();
        }
    }).disableSelection();

    checkFields();

    /*** Simple Editor ***/
    CKEDITOR.replaceAll(function (textarea, config) {
        if (textarea.className.includes("simpleEditor")) {
            config.toolbarGroups = [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            }, {
                "name": "document",
                "groups": ["mode"]
            },
            ];
            config.removeButtons = 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
            return true;
        }
    });


})

function resizeSwagger(obj) {
    obj.style.height = (obj.contentWindow.document.documentElement.scrollHeight + 300) + 'px';

    var new_style_element = document.createElement("style");
    new_style_element.textContent = ".information-container { display: none; }"
    obj.contentDocument.head.appendChild(new_style_element);
}


function setSortable(selector, url) {
    $(selector).click(function (e) {
        // get the current tree order
        arraied = $('ol.sortable').nestedSortable('toArray', { startDepthCount: 0 });

        // log it
        //console.log(arraied);

        // send it with POST
        $.ajax({
            url: url,
            type: 'POST',
            data: { tree: arraied },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function () {
                showNotySuccess("Done!<br>Your changes has been saved.");
            })
            .fail(function () {
                showNotyError("Error!<br>Your changes has not been saved.");
            })
            .always(function () {
                console.log("complete");
            });
    });
}

function showNotySuccess(text) {
    new Noty({
        theme: 'bootstrap-v4',
        type: "success",
        timeout: 5000,
        progressBar: true,
        text: text,
        onClose: function () {

        },
    }).show();
}


function showNotyError(text) {
    new Noty({
        theme: 'bootstrap-v4',
        type: "error",
        timeout: 5000,
        progressBar: true,
        modal: true,
        text: text
    }).show();
}

// Checks to see if the fields section has fields selected. If not, shows a placeholder
function checkFields() {
    $('#in_available_fields').addClass('has_fields');
    $('#in_primary_select').find('option').remove().end()

    if ($('#in_primary_fields li').length >= 1) {
        $('.primaryPanel').find('.alert').hide();
        $('#in_primary_fields').addClass('has_fields');
        $( "#in_primary_fields li" ).each(function( index ) {
            $('#in_primary_select').append($('<option>', {
                value: $( this ).attr('data-fid'),
                text: $( this ).text(),
                selected: true
            }));
        });
    } else {
        $('.primaryPanel').find('.alert').show();
        $('#in_primary_fields').removeClass('has_fields');
    }
}
