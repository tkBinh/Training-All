
$(function() {
    var arr = [];
    for(var i = 0; i <7 ; i++){
        var a = {
            y: document.getElementById('date'+i).value,
            a: document.getElementById('all'+i).value,
            b: document.getElementById('success'+i).value
        };
        arr.push(a);
    }
    Morris.Bar({
        element: 'morris-bar-chart',
        data: arr,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['KH nhận được', 'KH mua hàng'],
        hideHover: 'auto',
        resize: true
    });
    
});
