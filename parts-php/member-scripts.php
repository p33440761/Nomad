<script src="lib/jquery-3.6.0.js"></script>
<script src="./js/bootstrap.bundle.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="./js/nomad.js"></script>
<script src="./js/member.js"></script>


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