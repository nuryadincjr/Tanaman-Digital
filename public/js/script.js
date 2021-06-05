$(document).ready(function () {
    $(".product-image-thumb").on("click", function () {
        var $image_element = $(this).find("img");
        $(".product-image")
            .prop("src", $image_element.attr("src"))
            .width(600)
            .height(400);
        $(".product-image-thumb.active").removeClass("active");
        $(this).addClass("active");
    });
});

function sum() {
    var total = 0;
    $(".qty_number").each(function () {
        // or use .map.get()
        total += this.value ? parseInt(this.value) : 0;
    });
    $("#total_qty").val(total);
}

$(document).ready(function () {
    var max_fields = 20; //maximum input boxes allowed
    var $wrapper = $(".add_row"); //Fields wrapper
    var add_button = $(".add_row_click"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).on("click", function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            $("input[id^=medication_name]").focus();
            $wrapper.append(
                '<div class="custom_fields"><div class="col-md-6"><div class="row"><div class="col-md-6"><div class="form_group"><div class="plus_minus"><span class="value_button decrease" value="Decrease Value"> - </span><input type="number" id="number' +
                    x +
                    '" class="qty_number form_control" name="qty_number[]" class="form_control" value="0" /><span class="value_button increase" value="Increase Value"> + </span></div></div></div><div class="col-md-6"><div class="form_group"> <div class="btn_row remove_field"> <span> - </span> Remove  </div></div></div></div></div></div></div>'
            );
        }
    });

    $wrapper.on("click", ".remove_field", function (e) {
        //user click on remove text
        e.preventDefault();
        $(this).closest(".custom_fields").remove();
        x--;
        sum(); // remove also updates the total
    });
    $wrapper.on("click", ".value_button", function () {
        var $input = $(this).closest(".plus_minus").find(".qty_number");
        var value = parseInt($input.val(), 10);
        value = isNaN(value) ? 0 : value;
        value += $(this).is(".decrease") ? -1 : 1; // decrease on increase dependent on class
        if (value < 0) value = 0;
        $input.val(value);
        sum(); // sum each time
    });
    $wrapper.on("input", ".qty_number", sum); // any input or paste
});
