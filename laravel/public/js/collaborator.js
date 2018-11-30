$(document).ready(function () {
    $(".item").click(function () {
        $value = $('#btn_edit').val();
        if ($value != 'edit') {
            $('#btn_save').css('display', 'none');
            $('#btn_edit').val('edit').text('Sửa').removeClass('btn-info').addClass('btn-primary');
            changeTextInput();
        }
        var a = $(this).attr('id');
        $('#exampleModal').on('show.bs.modal', function () {
            $('#img_avatar_colla').attr('src', $('#' + a + 'image_avt').text())
            $('#id_colla').text(a)
            $('#btn_save').val(a)
            $('#name_colla').text($('#' + a + 'name').text())
            $('#area_colla').text($('#' + a + 'area').text())
            $('#phone_colla').text($('#' + a + 'phone').text())
            $('#email_colla').text($('#' + a + 'email').text())
            $('#acount_number_colla').val($('#' + a + 'acount_number').text())
            $('#name_bank_colla').val($('#' + a + 'name_bank').text())
            $('#contract_number_colla').val($('#' + a + 'contract_number').text())
            $('.acount_number_colla').text($('#' + a + 'acount_number').text())
            $('.name_bank_colla').text($('#' + a + 'name_bank').text())
            $('.contract_number_colla').text($('#' + a + 'contract_number').text())
            $('#car_colla').text($('#' + a + 'car').text())
            $('#img_cmt_front_colla').attr('src', $('#' + a + 'image_cmt_front').text())
            $('#img_cmt_back_colla').attr('src', $('#' + a + 'image_cmt_back').text())
            $('#created_colla').text($('#' + a + 'c_date').text())
            $('#sign_picture').attr('src', $('#' + a + 'image_sign').text())
			$('.id_card_number').text($('#' + a + 'id_card_number').text());
			var d = new Date($('#' + a + 'card_date_create').text());
			$('.card_date_create').text((d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear());
			$('.card_area_create').text($('#' + a + 'card_area_create').text());
			$('.address').text($('#' + a + 'address').text());
			var d = new Date($('#' + a + 'birthday').text());
			$('.birthday').text((d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear());
        });
    });
    $('#btn_edit').click(function () {
        $value = $(this).val();
        if ($value == 'edit') {
			var a = $('#id_colla').text();
            $('input[name="id_card_number"]').val($('#' + a + 'id_card_number').text());
			$('input[name="card_date_create"]').val($('#' + a + 'card_date_create').text());
			$('input[name="card_area_create"]').val($('#' + a + 'card_area_create').text());
			$('input[name="address"]').val($('#' + a + 'address').text());
			$('input[name="birthday"]').val($('#' + a + 'birthday').text());
			$('#btn_save').css('display', 'inline');
            $(this).val('cancel').text('Hủy').removeClass('btn-primary').addClass('btn-info');

        } else {
            var a = $('#id_colla').text();
			$('#btn_save').css('display', 'none');
            $('input[name="contractNumber"]').val($('#' + a + 'contract_number').text());
            $('input[name="acountNumber"]').val($('#' + a + 'acount_number').text());
            $('input[name="bankName"]').val($('#' + a + 'name_bank').text());
            $(this).val('edit').text('Sửa').removeClass('btn-info').addClass('btn-primary');
        }
        changeTextInput();
    })

    $('#btn_save').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('value');
        var contract_number = $('#contract_number_colla').val();
        var account_number = $('#acount_number_colla').val();
        var bank_name = $('#name_bank_colla').val();
		var birthday = $('#birthday_input').val();
		var id_card_number = $('#id_card_number_input').val();
		var card_date_create = $('#card_date_create_input').val();
		var card_area_create = $('#card_area_create_input').val();
		var address = $('#address_input').val();

        if (isNaN(contract_number) || isNaN(account_number)) {
            alert('Số hợp đồng và số tài khoản phải là số và không có dấu cách');
            return;
        }

        var strAlert = "";

        if (contract_number.trim() == "") {
            strAlert += "\"số hợp đồng\" ";
        }

        if (account_number.trim() == "") {
            strAlert += "\"số tài khoản\" ";
        }

        if (bank_name.trim() == "") {
            strAlert += "\"tên ngân hàng\" ";
        }

        if (strAlert != "") {
            alert('Không được để không được để trống ' + strAlert);
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'collaborator/update',
            type: 'POST',
            dataType: 'json',
            data: {
                'id': id,
                'contract_number': contract_number,
                'account_number': account_number,
                'bank_name': bank_name,
				'birthday': birthday,
				'id_card_number': id_card_number,
				'card_date_create': card_date_create,
				'card_area_create': card_area_create,
				'address': address,
            },
            success: function (data) {
                if (data.error == false) {
                    $('#btn_save').css('display', 'none');
                    $('#btn_edit').val('edit').text('Sửa').removeClass('btn-info').addClass('btn-primary');
                    changeTextInput();
                    $('input[name="contractNumber"]').val(contract_number);
                    $('input[name="acountNumber"]').val(account_number);
                    $('input[name="bankName"]').val(bank_name);
                    $('.acount_number_colla').text(account_number);
                    $('.name_bank_colla').text(bank_name);
                    $('.contract_number_colla').text(contract_number);
                    $('#' + id + 'acount_number').text(account_number);
                    $('#' + id + 'name_bank').text(bank_name);
                    $('#' + id + 'contract_number').text(contract_number);
					$('#' + id + 'birthday').text(birthday);
					$('#' + id + 'id_card_number').text(id_card_number);
					$('#' + id + 'card_date_create').text(card_date_create);
					$('#' + id + 'card_area_create').text(card_area_create);
					$('#' + id + 'address').text(address);
					var d = new Date(birthday);
					$('.birthday').text((d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear());
					$('.id_card_number').text(id_card_number);
					var d = new Date(card_date_create);
					$('.card_date_create').text((d.getMonth()+1) + "/" + d.getDate() + "/" + d.getFullYear());
					$('.card_area_create').text(card_area_create);
					$('.address').text(address);
                }
            }
        });
    })

    function changeTextInput() {
        $('#contract_number_colla').toggle();
        $('#acount_number_colla').toggle();
        $('#name_bank_colla').toggle();
        $('.contract_number_colla').toggle();
        $('.acount_number_colla').toggle();
        $('.name_bank_colla').toggle();
		$('.id_card_number').toggle();
		$('#id_card_number_input').toggle();
		$('.card_date_create').toggle();
		$('#card_date_create_input').toggle();
		$('.card_area_create').toggle();
		$('#card_area_create_input').toggle();
		$('.address').toggle();
		$('#address_input').toggle();
		$('.birthday').toggle();
		$('#birthday_input').toggle();
    }
    $('#selectYear').change(function(){
        var month = $('#selectMonth').val()
        updateMonth(month);
    });

    updateMonth = function(month){
        var year = $('#selectYear').val();
        var id = $('#collaborator_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': '../history/month',
            'data': {
                'year':year,
                'id':id,
                'month':month
            },
            'type': 'POST',
            success: function (data) {
                $('#selectMonth').html(data);
            }
        });
    }
    updateMonth($('#indexMonth').val());
});