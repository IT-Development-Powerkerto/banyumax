$(function(){
    $('#weight, #warehouse, #province_id, #city_id, #subdistrict_id, #courier, #shipping_promotion').on('change', function(){
        var weight = $("#weight").val();
        var warehouse = $("#warehouse").val();
        var province = $("#province_id").val();
        var city = $("#city_id").val();
        var subdistrict = $("#subdistrict_id").val();
        var	courier = $("#courier").val();
        var courier = courier.toLowerCase();
        var shipping_promotion = $("#shipping_promotion").val();
        if(warehouse == 'Cilacap'){
            document.getElementById("warehouse").setAttribute('class', 'form-control');
            var origin = 1442;
        }else if(warehouse == 'Kosambi'){
            document.getElementById("warehouse").setAttribute('class', 'form-control');
            var origin = 6278;
        }else if(warehouse == 'Tandes.Sby'){
            document.getElementById("warehouse").setAttribute('class', 'form-control');
            var origin = 6156;
        }else{
            document.getElementById("warehouse").setAttribute('class', 'form-control is-invalid');
        }

        if(subdistrict == ""){
            document.getElementById("subdistrict_id").setAttribute('class', 'form-control is-invalid');
        }else{
            document.getElementById("subdistrict_id").setAttribute('class', 'form-control');
        }
        if(weight == ""){
            document.getElementById("weight").setAttribute('class', 'form-control is-invalid');
        }else{
            document.getElementById("weight").setAttribute('class', 'form-control');
        }
        if(courier == ""){
            document.getElementById("courier").setAttribute('class', 'form-control is-invalid');
        }else{
            document.getElementById("courier").setAttribute('class', 'form-control');
        }
        if(warehouse != "" && subdistrict != "" && weight != "" && courier != ""){

            $.ajax({
                type: 'GET',
                url: "/ongkir/",
                data: {'origin': origin, 'destination': subdistrict, 'weight': weight, 'courier': courier},
                dataType: 'json',
                success: function(data){
                    data = Math.ceil(data / 1000) * 1000;
                    $('#shipping_price').val(data);
                },
                error: function(){
                    alert('Courier is not available, please choose another courier!');
                    $('#shipping_price').val(0);
                }
            });
        }
    });
});