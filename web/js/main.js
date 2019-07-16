function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

$('#cart-button').click(function(){
    $('#cart').modal();
});

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

$('.del-image').on('click', function(){
  var id = $(this).data('id');
  $.ajax({
    url: '/admin/products/deleteimage',
    data: {id: id},
    type: 'GET',
    success: function(res){
      $('.del-image').html(res);
      $('.postImg').remove();
    }
  });
});

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