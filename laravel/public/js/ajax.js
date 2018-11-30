$(document).ready(function () {
    $("a").click(function (e) {
        var a = $(this).attr('id')
        var b = '#user' + a
        var c = $(this).attr('value')
        $.ajax({
            'url': c + '/active',
            'data': {
                'users_id': a,
            },
            'type': 'GET',
            success: function (data) {
                console.log(data);
                if (data.error == true) {
                    $('#error').hide();
                    $('#error').removeClass();
                    $('#error').addClass("alert alert-danger fade in")
                    $('#error').show().text(data.message.errorActive);
                } else {
                    $('#error').hide();
                    $('#error').removeClass();
                    $('#error').addClass("alert alert-success fade in")
                    $('#error').show().text(data.message.succes);
                    if (data.status == 1) {
                        $(b).text('Active')
                        $(b).removeClass()
                        $(b).addClass("label label-primary")
                    }
                    if (data.status == 0) {
                        $(b).text('Inactive')
                        $(b).removeClass()
                        $(b).addClass("label label-danger")
                    }
                }
            }
        });
    })
    $('#submit').click(function (e) {
        e.preventDefault();
        var code = $('#collaborator_id').val();
        var cus_id = $('#customer_id').val();
        var amount = $('input[name="bonus"]').val();
        if (amount.trim() == "") {
            alert('Số tiền không được để trống');
            return;
        }
        amount = amount.replace(/[,VNĐ]/g, '');
        if (isNaN(amount)) {
            alert('Số tiền phải là số và không có dấu cách');
            return;
        }
        var note = $('#commission_note').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'customer/bonus',
            type: 'POST',
            dataType: 'json',
            data: {
                'collaborator_id': code,
                'customer_id': cus_id,
                'amount': amount,
                'note': note
            },
            success: function (data) {
                if (data.error == false) {
                    $('#error_bonus').hide();
                    $('#error_bonus').removeClass();
                    $('#error_bonus').addClass("alert alert-danger fade in")
                    $('#error_bonus').show().text(data.message.succes);
                }
                var amount = $('input[name="bonus"]').val('');
                $('#commission_note').val('');
            }
        });
    });

    $('button').click(function (e) {
        e.preventDefault();
        var cus = $(this).attr('value')
        var id = $(this).attr('id')
        if (id == ('btn-edit' + cus)) {
            $('#btn-edit' + cus).hide();
            $('#btn-save' + cus).show();
            $('#show_name' + cus).hide();
            $('#show_phone' + cus).hide();
            $('#customer_name' + cus).show();
            $('#phone' + cus).show();
            return;
        }
        var customer = $('input[name="customer_name' + cus + '"]').val()
        var phone = $('input[name="phone' + cus + '"]').val()
        var status = $('input[name="status' + cus + '"]:checked').val()
        if (customer.trim() == "" || phone.trim() == "") {
            alert('Tên và số điện thoại không được để trống');
            return;
        }

        if (isNaN(phone)) {
            alert('Số điện thoại phải là số và không có dấu cách');
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': 'customer/save',
            'data': {
                'customer_id': cus,
                'customer_name': customer,
                'phone': phone,
                'status': status,
            },
            'type': 'POST',
            success: function (data) {
                if (data.error == false) {
                    $(this).removeClass();
                    $(this).addClass("btn btn-xs btn-primary fa fa-check")
                }
                window.location.href = data.redirect;
            }
        });
    });

    $('input[name="bonus"]').on('input', function () {
        var amount = $('input[name="bonus"]').val();
        amount = amount.replace(/[,VNĐ]/g, '');
        var textMoney = readMoneyByText(amount);
        amount = formatNumber(amount, '.', ',');
        $('input[name="bonus"]').val(amount);
        $('#text-money').text(textMoney);
    });
    var textNumber = new Array(" không ", " một ", " hai ", " ba ", " bốn ", " năm ", " sáu ", " bảy ", " tám ", " chín ");
    var listMoney = new Array("", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ");

    function readThreeDigitNumber(threeDigitNumber) {
        var hundred;
        var dozens;
        var unit;
        var result = "";
        hundred = parseInt(threeDigitNumber / 100);
        dozens = parseInt((threeDigitNumber % 100) / 10);
        unit = threeDigitNumber % 10;
        if (hundred == 0 && dozens == 0 && unit == 0) return "";
        if (hundred != 0) {
            result += textNumber[hundred] + " trăm ";
            if ((dozens == 0) && (unit != 0)) result += " linh ";
        }
        if ((dozens != 0) && (dozens != 1)) {
            result += textNumber[dozens] + " mươi";
            if ((dozens == 0) && (unit != 0)) result = result + " linh ";
        }
        if (dozens == 1) result += " mười ";
        switch (unit) {
            case 1:
                if ((dozens != 0) && (dozens != 1)) {
                    result += " mốt ";
                } else {
                    result += textNumber[unit];
                }
                break;
            case 5:
                if (dozens == 0) {
                    result += textNumber[unit];
                } else {
                    result += " lăm ";
                }
                break;
            default:
                if (unit != 0) {
                    result += textNumber[unit];
                }
                break;
        }
        return result;
    }

    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }

    function readMoneyByText(money) {
        var times = 0;
        var i = 0;
        var number = 0;
        var result = "";
        var tmp = "";
        var listIndex = new Array();
        if (money < 0) return "Số tiền âm !";
        if (money == 0) return "Không đồng !";
        if (money > 0) {
            number = money;
        } else {
            number = -money;
        }
        if (money > 8999999999999999) {
            return "Số quá lớn!";
        }
        listIndex[5] = Math.floor(number / 1000000000000000);
        if (isNaN(listIndex[5]))
            listIndex[5] = "0";
        number = number - parseFloat(listIndex[5].toString()) * 1000000000000000;
        listIndex[4] = Math.floor(number / 1000000000000);
        if (isNaN(listIndex[4]))
            listIndex[4] = "0";
        number = number - parseFloat(listIndex[4].toString()) * 1000000000000;
        listIndex[3] = Math.floor(number / 1000000000);
        if (isNaN(listIndex[3]))
            listIndex[3] = "0";
        number = number - parseFloat(listIndex[3].toString()) * 1000000000;
        listIndex[2] = parseInt(number / 1000000);
        if (isNaN(listIndex[2]))
            listIndex[2] = "0";
        listIndex[1] = parseInt((number % 1000000) / 1000);
        if (isNaN(listIndex[1]))
            listIndex[1] = "0";
        listIndex[0] = parseInt(number % 1000);
        if (isNaN(listIndex[0]))
            listIndex[0] = "0";
        if (listIndex[5] > 0) {
            times = 5;
        } else if (listIndex[4] > 0) {
            times = 4;
        } else if (listIndex[3] > 0) {
            times = 3;
        } else if (listIndex[2] > 0) {
            times = 2;
        } else if (listIndex[1] > 0) {
            times = 1;
        } else {
            times = 0;
        }
        for (i = times; i >= 0; i--) {
            tmp = readThreeDigitNumber(listIndex[i]);
            result += tmp;
            if (listIndex[i] > 0) result += listMoney[i];
            if ((i > 0) && (tmp.length > 0)) result += ','; //&& (!string.IsNullOrEmpty(tmp))
        }
        if (result.substring(result.length - 1) == ',') {
            result = result.substring(0, result.length - 1);
        }
        result = result.substring(1, 2).toUpperCase() + result.substring(2);
        return result; //.substring(0, 1);//.toUpperCase();// + result.substring(1);
    }

    $('span').click(function () {
        var id = $(this).attr('value');
        var customer = $(this).attr('id');
        if (customer.slice(0, 6) == 'status') {
            $('#customer_id').val(id);
            getStatus(id);
        } else {
            customer = customer.slice(6);
            $('#collaborator_id').val(id);
            $('#customer_id').val(customer);
            $('#error_bonus').hide(true);
        }

    })

    getStatus = function (id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': 'customer/status',
            'data': {
                'customer_id': id,
            },
            'type': 'POST',
            success: function (data) {
                if (data.error == false) {
                    if (data.status != 0) {
                        $('#editStatus_' + data.status).prop("checked", true);
                    }
                    $('#editStatus_note').val(data.note);
                }
            }
        });
    };

    $('img').click(function () {
        var src = $(this).attr('src')
        $('#img_modal').attr('src', src);
        $('#imgModal').modal('show');
    });

    $('#submit-status').click(function (e) {
        var status = $('input[name="editStatus"]:checked').val();
        var id = $('#customer_id').val();
        var note = $('#editStatus_note').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': 'customer/save-status',
            'data': {
                'customer_id': id,
                'status': status,
                'note': note,
            },
            'type': 'POST',
            success: function (data) {
                if (data.error == false) {
                    window.location.href = data.redirect;
                }
            }
        });
    });


});