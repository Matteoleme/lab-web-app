var app = {
    baseURL: "./data.php",
    productList: {},
    init: function () {
        console.log("Init here!");
        // Get the product list from the database
        app.getProductList();
    },
    getProductList: function() {
        // make a HTTP GET request
        let query_string = window.location.search;
        console.log(query_string);
        $.getJSON(`${app.baseURL}${query_string}`)
        .done(app.onSuccess)
        .fail(app.onError);
    },
    onSuccess: function (jsonData) {
        console.log(jsonData);
        app.productList = jsonData.productList;
        let item = app.productList[0];
        $(".card-title>a").html(item.name);
        $(".card-body>img").attr("src",item.img_url);
    
    },

    onError: function (e) {
        console.log("error!");
        console.log(JSON.stringify(e));
    }
};

$(document).ready(app.init);