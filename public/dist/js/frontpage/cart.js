function calculate_subtotal() {
    let summary_sub_total = 0;
    $("#cart-item-list")
        .children()
        .each((index, element) => {
            summary_sub_total += parseInt(element.dataset.sub_total);
        });

    return summary_sub_total;
}

function calculate_total(shipping_fee = 0) {
    return (
        parseInt(calculate_subtotal()) +
        parseInt(
            shipping_fee == 0
                ? $("#cart-shipping-fee").data("cart_shipping_fee")
                : shipping_fee
        )
    );
}

function total_to_html(shipping_fee = 0) {
    $("#cart-total-pay").html(
        new Intl.NumberFormat("id", {
            style: "currency",
            currency: "IDR",
        }).format(calculate_total(shipping_fee))
    );

    $("#cart-total-pay").attr("data-total", calculate_total());
}

function getCity(province_id) {
    if ($("#input-province").val() == "no") {
        $("#expedition-type")
            .children()
            .each((index, element) => {
                element.remove();
            });
        $("#expedition-type").append(`
            <option value=""> --- Please Select Province & City First --- </option>
        `);
    } else {
        $.ajax({
            url: "/api/city",
            type: "GET",
            data: {
                province: province_id,
            },
            beforeSend: () => {
                $("#input-city").append(
                    ` <option value=""> Getting Data, Please Wait </option>`
                );
            },
            success: (result) => {
                $("#input-city")
                    .children()
                    .each((index, element) => {
                        if (index > 0) element.remove();
                    });

                result.forEach((item) => {
                    $("#input-city").append(
                        ` <option value="${item.city_id}"> ${
                            item.type + " " + item.city_name
                        } </option>`
                    );
                });
            },
        });
    }
}

var ongkir;

function set_ongkir(data) {
    ongkir = data;
}

function getCost() {
    if ($("#input-city").val() == "no" || $("#input-province").val() == "no") {
        $("#expedition-type")
            .children()
            .each((index, element) => {
                element.remove();
            });
        $("#expedition-type").append(`
            <option value=""> --- Please Select Province & City First --- </option>
        `);
    } else {
        $.ajax({
            url: "/api/cost",
            type: "GET",
            data: {
                origin: 27,
                destination: $("#input-city").val(),
                weight: $("#cart-total-weight").val(),
                courier: $("#expedition").val(),
            },
            async: false,
            success: (result) => {
                set_ongkir(result);

                $("#expedition-type")
                    .children()
                    .each((index, element) => {
                        element.remove();
                    });

                $("#expedition-type").append(
                    `<option value=""> --- Please Select Service --- </option>`
                );

                ongkir.results[0].costs.forEach((item, index) => {
                    $("#expedition-type").append(`
                    <option value="${index}"> ${item.service} IDR ${item.cost[0].value} </option>
                `);
                });
            },
        });
    }
}

function chooseExpeditionService(index) {
    $("#cart-shipping-fee").html(
        new Intl.NumberFormat("id", {
            style: "currency",
            currency: "IDR",
        }).format(ongkir.results[0].costs[index].cost[0].value)
    );

    $("#cart-shipping-fee").attr(
        "data-cart_shipping_fee",
        ongkir.results[0].costs[index].cost[0].value
    );
    total_to_html(ongkir.results[0].costs[index].cost[0].value);

    if ($("#package-receiver").length == 1) {
        const child = $("#package-receiver").children();
        child[0].children[1].innerHTML = ongkir.destination_details.province;
        child[1].children[1].innerHTML =
            ongkir.destination_details.type +
            " " +
            ongkir.destination_details.city_name;
        child[2].children[1].innerHTML = "alamat";
        child[3].children[1].innerHTML = "no telp";
    }

    if ($("#package-sender").length == 1) {
        const child = $("#package-sender").children();
        child[0].children[1].innerHTML = result["origin_details"].province;
        child[1].children[1].innerHTML =
            result["origin_details"].type +
            " " +
            result["origin_details"].city_name;
        child[2].children[1].innerHTML = "alamat";
    }

    if ($("#input-shipping-cost").length == 1) {
        $("#input-shipping-cost").val(
            ongkir.results[0].costs[index].cost[0].value
        );
    }

    if ($("#input-shipping-destination-province").length == 1) {
        $("#input-shipping-destination-province").val(
            ongkir.destination_details.province
        );
    }

    if ($("#input-shipping-destination-city").length == 1) {
        $("#input-shipping-destination-city").val(
            ongkir.destination_details.city_name
        );
    }

    $("#expedition-type-hidden-text").val(
        ongkir.results[0].costs[index].service
    );
}

function update_quantity(product_code, user_id) {
    let quantity = parseInt($("#" + product_code + "-quantity").val());
    if (quantity >= parseInt($("#" + product_code + "-quantity").attr("max"))) {
        quantity = parseInt($("#" + product_code + "-quantity").attr("max"));
        // reset qty to max value
        $("#" + product_code + "-quantity").val(quantity);
    }
    $.ajax({
        url: "/api/update-cart-quantity",
        type: "GET",
        data: {
            qty: quantity,
            product: product_code,
            user: user_id,
        },
        success: (result) => {
            console.log(result);
        },
    });

    // search row by product code
    const element = $(`[data-product="${product_code}"]`).first();

    // count row sub_total
    let sub_total = quantity * element.data("price");
    element.attr("data-sub_total", sub_total);
    $("#summary-cart-subtotal").attr("data-sub_total", calculate_subtotal());
    $("#summary-cart-subtotal").html(
        new Intl.NumberFormat("id", {
            style: "currency",
            currency: "IDR",
        }).format(calculate_subtotal())
    );
    // update row subtotal
    element
        .children()
        .last()
        .html(
            new Intl.NumberFormat("id", {
                style: "currency",
                currency: "IDR",
            }).format(sub_total)
        );
    // update cart total
    total_to_html($("#cart-shipping-fee").data("cart_shipping_fee"));
}

function commitOrder() {}
