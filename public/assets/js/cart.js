function updateCartItem(productId, price) {
    var subtotal = 0;
    var deliveryFee = 0;
    var quantityInputs = document.querySelectorAll(".input-qty");

    quantityInputs.forEach(function (input) {
        var quantity = parseInt(input.value);
        subtotal += price * quantity;
    });

var totalPrice = subtotal + deliveryFee;
var formattedSubtotal = subtotal.toLocaleString("vi-VN", {
    style: "currency",
    currency: "VND",
});
var formattedTotalPrice = totalPrice.toLocaleString("vi-VN", {
    style: "currency",
    currency: "VND",
});

document.getElementById("subtotal").textContent = formattedSubtotal;
document.getElementById("totalPrice").textContent = formattedTotalPrice;

var quantity = parseInt(document.getElementById("input" + productId).value);
console.log(quantity);


    axios
        .post("/addToCart/" + productId, {
            quantity: quantity,
        })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.error(error);
        });
}
