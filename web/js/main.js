
//Show cart
function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

//Open cart
$('#cart-button').click(function(){
    $('#cart').modal();
});

//Select city
$('.check-city').click(function(){
  $('.cities-select').addClass('show');
});

//Select area
$('.check-area').click(function(){
  $('.areas-select').addClass('show');
});

//Add to cart
$('.add-to-cart').on('click', function(e){
  e.preventDefault();
  var id = $(this).data('id');
  $.ajax({
    url: '/cart/add',
    data: {id: id},
    type: 'GET',
    success: function (res) {
      showCart(res);
      //console.log(res);
    },
    error: function(){
      alert('Error!');
    }
  });
});

//Clear cart
function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
            //console.log(res);
        },
        error: function(){
            alert('Error!');
        }
    });
}

//Delete items from cart
$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
            //console.log(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});

//Delete admin image
function delImage(id, url){
  $.ajax({
    url: url,
    data: {id: id},
    type: 'GET',
    success: function(res){
      $('.del-image').html(res);
      $('.postImg').remove();
    }
  });
}

//Delete admin icon
function delIcon(id, url){
  $.ajax({
    url: url,
    data: {id: id},
    type: 'GET',
    success: function(res){
      $('.del-icon').html(res);
      $('.postIcon').remove();
    }
  });
}

//Points list in Area
$('#select-city').change(function(){
    var city = this.value;
    //alert(city);
    $.ajax({
        url: '/admin/area/pointlist',
        data: {id: city},
        type: 'POST',
        success: function (res) {
            $("select#select-point").html(res).attr("disabled", false)
        },
        error: function(){
            alert('Не удаётся отобразить список точек для выбранного города');
        }
    });
});




