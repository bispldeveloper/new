<script src="{{ admin('js/tinymce/tinymce.min.js') }}"></script>
<script>
    $("body").css('position', 'static');

    tinymce.init({
        branding: false,
        relative_urls: false,
        selector: ".basic-editor",
        plugins: [
            "advlist autolink lists link charmap preview autoresize",
            "searchreplace visualblocks fullscreen",
            "contextmenu paste"
        ],
        spellchecker_language: 'en',
        moxiemanager_title: "File Manager",
        toolbar: "undo redo | bold italic | link",
        browser_spellcheck: true,
        fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
        link_list: [
            @foreach($pages as $pageGroup => $pageLinks)
                {title: '{{ $pageGroup }}', menu: [
                    @foreach($pageLinks as $url => $name)
                        {title: '{{ $name }}', value: '{{ $url }}'},
                    @endforeach
                ]},
            @endforeach
        ]
    });

    tinymce.init({
        branding: false,
        selector: ".advanced-editor",
        relative_urls: false,
        plugins: [
            "importcss advlist autolink lists link image charmap print preview anchor autoresize",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu textcolor colorpicker paste"
        ],
        textcolor_map: [
            "000000", "Black",
            "993300", "Burnt orange",
            "333300", "Dark olive",
            "003300", "Dark green",
            "003366", "Dark azure",
            "000080", "Navy Blue",
            "333399", "Indigo",
            "333333", "Very dark gray",
            "800000", "Maroon",
            "FF6600", "Orange",
            "808000", "Olive",
            "008000", "Green",
            "008080", "Teal",
            "0000FF", "Blue",
            "666699", "Grayish blue",
            "808080", "Gray",
            "FF0000", "Red",
            "FF9900", "Amber",
            "99CC00", "Yellow green",
            "339966", "Sea green",
            "33CCCC", "Turquoise",
            "3366FF", "Royal blue",
            "800080", "Purple",
            "999999", "Medium gray",
            "FF00FF", "Magenta",
            "FFCC00", "Gold",
            "FFFF00", "Yellow",
            "00FF00", "Lime",
            "00FFFF", "Aqua",
            "00CCFF", "Sky blue",
            "993366", "Red violet",
            "FFFFFF", "White",
            "FF99CC", "Pink",
            "FFCC99", "Peach",
            "FFFF99", "Light yellow",
            "CCFFCC", "Pale green",
            "CCFFFF", "Pale cyan",
            "99CCFF", "Light sky blue",
            "CC99FF", "Plum"
        ],
        moxiemanager_title: "File Manager",
        style_formats: [
            {title: 'paragraph', block: 'p'},
            {title: 'Header 1', block: 'h1'},
            {title: 'Header 2', block: 'h2'},
            {title: 'Header 3', block: 'h3'},
            {title: 'Header 4', block: 'h4'},
            {title: 'Header 5', block: 'h5'},
            {title: 'Header 6', block: 'h6'},
            {
                title: 'Image Left', selector: 'img', styles: {
                'float': 'left',
                'margin-right': '20px',
                'margin-bottom': '0px',
                'margin-left': '0px',
            }
            },
            {
                title: 'Image Right', selector: 'img', styles: {
                'float': 'right',
                'margin-left': '20px',
                'margin-bottom': '0px',
                'margin-right': '0px',
            }
            },
            {
                title: 'Margin Left', inline: 'span', styles: {
                'margin-left': '20px',
                'margin-bottom': '20px',
            }
            },
            {
                title: 'Margin Right', inline: 'span', styles: {
                'margin-right': '20px',
                'margin-bottom': '20px',
            }
            },
            {
                title: 'Margin Both Sides', inline: 'span', styles: {
                'margin-right': '20px',
                'margin-left': '20px',
                'margin-bottom': '20px',
            }
            },
            {
                title: 'Yellow Box', inline: 'span', styles: {
                'padding': '20px',
                'color': '#000',
                'background-color': '#fdd339',
                'display': 'block'
            }
            }
        ],

        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Hide for mobile', value: 'hide-for-small'},
            {title: 'Hide for tablet', value: 'hide-for-medium'}
        ],

        external_plugins: {
            "moxiemanager": "/assets/admin/js/moxiemanager/plugin.js"
        },
        importcss_append: true,
        importcss_groups: [
            {title: 'Table styles', filter: /^(a)\./}, // Group Link Styles
        ],
        toolbar: "undo redo | styleselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media insertfile | forecolor backcolor",
        mediaembed_service_url: "SERVICE_URL",
        mediaembed_max_width: 450,
        link_list: [
            @foreach($pages as $pageGroup => $pageLinks)
                {title: '{{ $pageGroup }}', menu: [
                    @foreach($pageLinks as $url => $name)
                        {title: '{{ $name }}', value: '{{ $url }}'},
                    @endforeach
                ]},
            @endforeach
        ]
    });

</script>
