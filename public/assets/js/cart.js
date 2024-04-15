function updateCartItem(productId, price) {
  var subtotal = 0;
  var deliveryFee = 40;
  var quantityInputs = document.querySelectorAll('.input-qty');

  quantityInputs.forEach(function(input) {
      var quantity = parseInt(input.value);
      subtotal += price * quantity; 
  });

  var totalPrice = subtotal + deliveryFee; 
  document.getElementById('subtotal').textContent = subtotal + '$';
  document.getElementById('totalPrice').textContent = totalPrice + '$';
  var quantity = parseInt(document.getElementById('input'+productId).value);
  console.log(quantity)


  axios.post("/addToCart/"+ productId, {
    quantity: quantity
  })
  .then(function (response) {
      console.log(response.data);
  })
  .catch(function (error) {
      console.error(error);
  });
}
