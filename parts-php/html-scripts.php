    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>

    <script src="./js/nomad.js"></script>

    <script>
function showCartCount(cart) {
    let total = 0;
    for (let p in cart) {
        for (let i in cart[p]) {
            total += cart[p][i].quantity;
        }
    }
    $('.nav-badge').text(total);
    console.log(Number.isNaN(total));
}

$.get('cart-api-2.php', function(data) {
    console.log(data);
    showCartCount(data);
}, 'json');
    </script>