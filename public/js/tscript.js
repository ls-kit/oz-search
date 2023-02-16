$('#showSearchForm').html(`
    <select name="tagA" id="tagA" data-search="">
        <option value="">-- select --</option>
        <option value="new">New</option>
        <option value="p_1">p_1</option>
        <option value="old">Old</option>
    </select>

    <select name="tagB" id="tagB" data-search="">
        <option value="">-- select --</option>
        <option value="armband">Armband</option>
        <option value="legband">Legband</option>
        <option value="headband">Headband</option>
    </select>

    <select name="tagC" id="tagC" data-search="">
        <option value="">-- select --</option>
        <option value="ring">Ring</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
    </select>



    <button id="search" type="button">Search</button><br><br>

    <input type="range" name="query2" id="query2" min="1" max="500" value="100">

    <button id="search2" type="button">Search</button><br><br>

    <div id="collections">
        <div>Collections</div>
    </div>

    <br><div id="priceTags">
        <div>Price Tags</div>
    </div>
`);

// FOR TRIPLE DROPDOWN
$('#search').click(function (e) {
    e.preventDefault();
    let query1 = "";
    console.log(query1);

    $.each($('select[data-search]'), function (indexInArray, valueOfElement) {
        if ($(this).val() != "") {
            if (query1 == "") {
                query1 += $(this).val();
            } else {
                query1 += ("," + $(this).val());
            }
        }
    });
    console.log(query1);

    if (query1 != "") {
        $.ajax({
            type: "GET",
            url: "http://tes-store-ns.myshopify.com/search/suggest.json?q=" + query1 + "&resources[type]=product&resources[limit]=10&resources[options][fields]=tag",
            data: "",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    }
});

// FOR RANGE SLIDER
$('#search2').click(function (e) {
    e.preventDefault();
    let query2 = $('#query2').val();
    console.log(query2);
    $.ajax({
        type: "GET",
        url: "http://tes-store-ns.myshopify.com/search/suggest.json?q=" + query2 + "&resources[type]=product&resources[limit]=10&resources[options][fields]=tag",
        data: "",
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
});

// FOR COLLECTION CHECKBOX
$.ajax({
    type: "GET",
    url: "http://tes-store-ns.myshopify.com/admin/api/2023-01/collections.json",
    data: "",
    dataType: "json",
    success: function (response) {
        $.each(response.collections, function (index, collection) {
            $('#collections').append(`
                <input type="checkbox" id="` + collection.title + `" value="` + collection.title + `">
                <label for="` + collection.title + `">` + collection.title + `</label><br>
           `);
        });

        $('input[type="checkbox"]').click(function (e) {
            if ($(this).prop("checked") == true) {
                let query3 = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "http://tes-store-ns.myshopify.com/search/suggest.json?q=" + query3 + "&resources[type]=collection&resources[limit]=10&resources[options][fields]=title",
                    data: "",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    }
});

// FOR PRICE RAG CHECKBOX
$.ajax({
    type: "GET",
    url: "http://tes-store-ns.myshopify.com/admin/products/tags.json",
    data: "",
    dataType: "json",
    success: function (response) {
        console.log('Tags: ', response.tags);
        let prefix = "price_";
        $.each(response.tags, function (index, tag) {
            if (tag.includes(prefix)) {
                $('#priceTags').append(`
                     <input type="checkbox" id="` + tag + `" value="` + tag + `" data-search="tag">
                     <label for="` + tag + `">` + tag + `</label><br>
                `);
            }
        });

        $('input[data-search="tag"]').click(function (e) {
            if ($(this).prop("checked") == true) {
                let query4 = $(this).val();
                console.log(query4);
                $.ajax({
                    type: "GET",
                    url: "http://tes-store-ns.myshopify.com/search/suggest.json?q=" + query4 + "&resources[type]=product&resources[limit]=10&resources[options][fields]=tag",
                    data: "",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        });
    }
});
