$(function(){
    function shippingPromo(id){
        return $.parseJSON(
            $.ajax({
                url: "get_shipping_promotion/"+id,
                type: "GET",
                dataType: "json",
                async: false,
                success: function(data){
                    // console.log(data);
                    // $("#product_promotion").val(parseInt(data.product_promotion));
                },
                error: function(err){
                    console.log(err);
                }
            }).responseText
        );
    }

    function productPromo(id){
        return $.parseJSON(
            $.ajax({
                url: "get_product_promotion/"+id,
                type: "GET",
                dataType: "json",
                async: false,
                success: function(data){
                    // console.log(data);
                    // $("#product_promotion").val(parseInt(data.product_promotion));
                },
                error: function(err){
                    console.log(err);
                }
            }).responseText
        );
    }

    function adminPromo(id){
        return $.parseJSON(
            $.ajax({
                url: "get_admin_promotion/"+id,
                type: "GET",
                dataType: "json",
                async: false,
                success: function(data){
                    // console.log(data);
                    // $("#admin_promotion").val(parseInt(data.admin_promotion));
                },
                error: function(err){
                    console.log(err);
                }
            }).responseText
        );
    }

    $('#payment_method, #courier, #quantity, #product_name, #price, #product_promotion_id, #add_product_promotion_id, #shipping_promotion_id, #add_shipping_promotion_id, #admin_promotion_id, #add_admin_promotion_id, #province, #promotion_admin').on('change', function(){
        var name = $('#name').val();
        var address = $('#address').val();
        var province = $('#province_id').find(":selected").text();
        var city = $('#city').find(":selected").text();
        var subdistrict = $('#subdistrict_id').find(":selected").text();
        var whatsapp = $('#whatsapp').val();
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        var product_promotion_id = $('#product_promotion_id').val();
        var shipping_promotion_id = $('#shipping_promotion_id').val();
        var admin_promotion_id = $('#admin_promotion_id').val();
        var add_product_promotion_id = $('#add_product_promotion_id').val();
        var add_shipping_promotion_id = $('#add_shipping_promotion_id').val();
        var add_admin_promotion_id = $('#add_admin_promotion_id').val();
        var shipping_price = $('#shipping_price').val();
        var payment_method = $('#payment_method').val();
        var courier = $('#courier').val();
        var product = $('#product_name').find(":selected").text();
        var province_id = $('#province_id').find(":selected").val();
        var ongkir = parseInt(shipping_price);
        var total_price = (parseInt(price) * parseInt(quantity));

        if(product_promotion_id){
            // var pp = $.parseJSON(
            //     $.ajax({
            //         url: "get_product_promotion/"+product_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#product_promotion").val(parseInt(data.product_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var pp = productPromo(product_promotion_id);
            // console.log('pp'+pp);
            if(pp.product_promotion_percent == 0 && pp.product_promotion == 0){
                var promo_product = 0;
            }else if(pp.product_promotion_percent != 0 && pp.product_promotion == 0){
                var promo_product = total_price*pp.product_promotion_percent/100;
            }else if(pp.product_promotion_percent == 0 && pp.product_promotion != 0){
                var promo_product = quantity*pp.product_promotion;
            }else{
                if ((total_price*pp.product_promotion_percent/100) > pp.product_promotion){
                    var promo_product = quantity*pp.product_promotion;
                }
                else{
                    var promo_product = total_price*pp.product_promotion_percent/100;
                }
            }
            promo_product = parseInt(promo_product);
            $("#product_promotion").val(promo_product);
            $("#ori_product_promotion").val(promo_product);
            total_price -= promo_product;
            $('#total_price').val(parseInt(total_price));
        }else{
            promo_product = 0;
            $("#product_promotion").val(promo_product);
            $("#ori_product_promotion").val(promo_product);
            total_price -= promo_product;
            $('#total_price').val(total_price);
        }
        if(add_product_promotion_id){
            // var app = $.parseJSON(
            //     $.ajax({
            //         url: "get_product_promotion/"+add_product_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#product_promotion").val(parseInt(data.product_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var app = productPromo(add_product_promotion_id);
            if(app.product_promotion_percent == 0 && app.product_promotion == 0){
                var add_promo_product = 0;
            }else if(app.product_promotion_percent != 0 && app.product_promotion == 0){
                var add_promo_product = total_price*app.product_promotion_percent/100;
            }else if(app.product_promotion_percent == 0 && app.product_promotion != 0){
                var add_promo_product = quantity*app.product_promotion;
            }else{
                if ((total_price*app.product_promotion_percent/100) > app.product_promotion){
                    var add_promo_product = quantity*app.product_promotion;
                }
                else{
                    var add_promo_product = total_price*app.product_promotion_percent/100;
                }
            }
            add_promo_product = parseInt(add_promo_product);
            $("#add_product_promotion").val(add_promo_product);
            $("#product_promotion").val(promo_product+add_promo_product);
            total_price -= add_promo_product;
            $('#total_price').val(parseInt(total_price));
        }else{
            add_promo_product = 0;
            $("#add_product_promotion").val(add_promo_product);
            $("#product_promotion").val(promo_product+add_promo_product);
            total_price -= add_promo_product;
            $('#total_price').val(total_price);
        }
        console.log('addition promo: '+add_promo_product);
        console.log('total price: '+total_price);
        if(shipping_promotion_id){
            // var sp = $.parseJSON(
            //     $.ajax({
            //         url: "get_shipping_promotion/"+shipping_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#shipping_promotion").val(parseInt(data.shipping_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var sp = shippingPromo(shipping_promotion_id);
            console.log('sp'+sp.shipping_promotion);
            if(sp.shipping_promotion_percent == 0 && sp.shipping_promotion == 0){
                var promo_ongkir = 0;
            }else if(sp.shipping_promotion_percent != 0 && sp.shipping_promotion == 0){
                var promo_ongkir = ongkir*sp.shipping_promotion_percent/100;
            }else if(sp.shipping_promotion_percent == 0 && sp.shipping_promotion != 0){
                var promo_ongkir = sp.shipping_promotion;
            }else{
                if ((ongkir*sp.shipping_promotion_percent/100) > sp.shipping_promotion){
                    var promo_ongkir = sp.shipping_promotion;
                }
                else{
                    var promo_ongkir = ongkir*sp.shipping_promotion_percent/100;
                }
            }
            promo_ongkir = parseInt(promo_ongkir);
            console.log('promo ongkir: '+promo_ongkir);
            $("#shipping_promotion").val(promo_ongkir);
            $("#ori_shipping_promotion").val(promo_ongkir);
        }else{
            promo_ongkir = 0;
            $("#ori_shipping_promotion").val(promo_ongkir);
            $("#shipping_promotion").val(promo_ongkir);
        }
        if(add_shipping_promotion_id){
            // var asp = $.parseJSON(
            //     $.ajax({
            //         url: "get_shipping_promotion/"+add_shipping_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#shipping_promotion").val(parseInt(data.shipping_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var asp = shippingPromo(add_shipping_promotion_id);
            if(asp.shipping_promotion_percent == 0 && asp.shipping_promotion == 0){
                var add_promo_ongkir = 0;
            }else if(asp.shipping_promotion_percent != 0 && asp.shipping_promotion == 0){
                var add_promo_ongkir = ongkir*asp.shipping_promotion_percent/100;
            }else if(asp.shipping_promotion_percent == 0 && asp.shipping_promotion != 0){
                var add_promo_ongkir = asp.shipping_promotion;
            }else{
                if ((ongkir*asp.shipping_promotion_percent/100) > asp.shipping_promotion){
                    var add_promo_ongkir = asp.shipping_promotion;
                }
                else{
                    var add_promo_ongkir = ongkir*asp.shipping_promotion_percent/100;
                }
            }
            add_promo_ongkir = parseInt(add_promo_ongkir);
            $("#add_shipping_promotion").val(add_promo_ongkir);
            var total_promo_ongkir = promo_ongkir+add_promo_ongkir;
            total_promo_ongkir = parseInt(total_promo_ongkir);
            $("#shipping_promotion").val(total_promo_ongkir);
        }else{
            add_promo_ongkir = 0;
            $("#add_shipping_promotion").val(add_promo_ongkir);
            var total_promo_ongkir = promo_ongkir+add_promo_ongkir;
            total_promo_ongkir = parseInt(total_promo_ongkir);
            $("#shipping_promotion").val(total_promo_ongkir);
        }
        if(total_promo_ongkir >= ongkir){
            var total_ongkir = 0;
            total_promo_ongkir = ongkir;
        }else{
            var total_ongkir = ongkir - total_promo_ongkir;
            total_promo_ongkir = total_promo_ongkir;
        }
        total_ongkir = parseInt(total_ongkir);
        $('#total_shipping').val(total_ongkir);
        // console.log('ongkir: '+ongkir, 'promo: '+promo_ongkir, 'total ongkir: '+total_ongkir);
        if(courier === 'Ninja' && payment_method === 'COD'){
            var admin = (total_price + total_ongkir) * 0.025;
            admin = Math.ceil(admin / 1000) * 1000;
            $('#shipping_admin').val(parseInt(admin));

        }
        else if(courier === 'Sicepat' && payment_method === 'COD'){
            var admin = (total_price + total_ongkir)*0.030;
            if(admin < 2000){
                admin = 2000;
            }
            admin = Math.ceil(admin / 1000) * 1000;
            $('#shipping_admin').val(parseInt(admin));
        }
        else if(courier === 'JNT' && payment_method === 'COD'){
            var admin = (total_price + total_ongkir)*0.030;
            if(admin < 5000){
                admin = 5000;
            }
            admin = Math.ceil(admin / 1000) * 1000;
            $('#shipping_admin').val(parseInt(admin));

        }
        else if(payment_method == "Transfer"){
            admin = 0;
            $('#shipping_admin').val(admin);
        }

        if(admin_promotion_id){
            // var ap = $.parseJSON(
            //     $.ajax({
            //         url: "get_admin_promotion/"+admin_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#admin_promotion").val(parseInt(data.admin_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var ap = adminPromo(admin_promotion_id);
            if(ap.admin_promotion_percent == 0 && ap.admin_promotion == 0){
                var promo_admin = 0;
            }else if(ap.admin_promotion_percent != 0 && ap.admin_promotion == 0){
                var promo_admin = admin*ap.admin_promotion_percent/100;
            }else if(ap.admin_promotion_percent == 0 && ap.admin_promotion != 0){
                var promo_admin = ap.admin_promotion;
            }else{
                if ((ongkir*ap.admin_promotion_percent/100) > ap.admin_promotion){
                    var promo_admin = ap.admin_promotion;
                }
                else{
                    var promo_admin = admin*ap.admin_promotion_percent/100;
                }
            }
            // console.log(ap);
            promo_admin = parseInt(promo_admin);
            $("#ori_admin_promotion").val(promo_admin);
            $("#admin_promotion").val(promo_admin);
        }else{
            promo_admin = 0;
            $("#ori_admin_promotion").val(promo_admin);
            $("#admin_promotion").val(promo_admin);
        }
        if(add_admin_promotion_id){
            // var aap = $.parseJSON(
            //     $.ajax({
            //         url: "get_admin_promotion/"+add_admin_promotion_id,
            //         type: "GET",
            //         dataType: "json",
            //         async: false,
            //         success: function(data){
            //             // console.log(data);
            //             // $("#admin_promotion").val(parseInt(data.admin_promotion));
            //         },
            //         error: function(err){
            //             console.log(err);
            //         }
            //     }).responseText
            // );
            var aap = adminPromo(add_admin_promotion_id);
            if(aap.admin_promotion_percent == 0 && aap.admin_promotion == 0){
                var add_promo_admin = 0;
            }else if(aap.admin_promotion_percent != 0 && aap.admin_promotion == 0){
                var add_promo_admin = admin*aap.admin_promotion_percent/100;
            }else if(aap.admin_promotion_percent == 0 && aap.admin_promotion != 0){
                var add_promo_admin = aap.admin_promotion;
            }else{
                if ((ongkir*aap.admin_promotion_percent/100) > aap.admin_promotion){
                    var add_promo_admin = aap.admin_promotion;
                }
                else{
                    var add_promo_admin = admin*aap.admin_promotion_percent/100;
                }
            }
            // console.log(ap);
            add_promo_admin = parseInt(add_promo_admin);
            $("#add_admin_promotion").val(add_promo_admin);
            var total_promo_admin = promo_admin+add_promo_admin;
            total_promo_admin = parseInt(total_promo_admin);
            $("#admin_promotion").val(total_promo_admin);
        }else{
            add_promo_admin = 0;
            $("#add_admin_promotion").val(add_promo_admin);
            var total_promo_admin = promo_admin+add_promo_admin;
            total_promo_admin = parseInt(total_promo_admin);
            $("#admin_promotion").val(total_promo_admin);
        }
        if(total_promo_admin >= admin){
            var total_admin = 0;
            total_promo_admin = admin;
        }else{
            var total_admin = admin - total_promo_admin;
            total_promo_admin = total_promo_admin;
        }
        console.log('admin COD: '+admin);
        total_admin = parseInt(total_admin);
        $('#total_admin').val(total_admin);

        var total_payment = total_price + total_ongkir + total_admin;
        total_payment = parseInt(total_payment);
        $('#total_payment').val(total_payment);
    });
});
