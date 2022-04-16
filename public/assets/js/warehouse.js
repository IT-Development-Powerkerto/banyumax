$(function(){
    $('#province').on('change', function(){
        let province_id = $(this).val();
        if(province_id){
            $.ajax({
                url: "/city/"+province_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#city').empty();
                    $.each(data, function(key, value){
                        // $('#city').append('<option value="'+value.city_id+'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                        $('#city').append(`<option value="${value.city_id}_${value.city_name}">${value.city_name}</option>`);
                    });
                }
            });
        }else {
            $('#city').empty();
        }
    });

    $('#city').on('change', function(){
        let city_id = $(this).val();
        if(city_id){
            $.ajax({
                url: "/subdistrict/"+city_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#subdistrict').empty();
                    $.each(data, function(key, value){
                        // $('#subdistrict').append('<option value="'+value.subdistrict_id+'_'+value.subdistrict_name">' + value.subdistrict_name + '</option>');
                        $('#subdistrict').append(`<option value="${value.subdistrict_id}_${value.subdistrict_name}">${value.subdistrict_name}</option>`);
                    });
                }
            });
        }else {
            $('#subdistrict').empty();
        }
    });
});