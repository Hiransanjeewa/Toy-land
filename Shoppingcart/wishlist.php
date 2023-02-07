<?php
    include '../connection/connection.php';
    session_start();
?>
<HTML>
<HEAD>
<TITLE>WishList</TITLE>
<link href="whishliststyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
    <div id="shopping-cart">
        <div class="whishlist-cntr">
            <div class="txt-heading">Wishlist</div>
            <div id="whishlist-grid">

	        <?php
                $query = 'SELECT * FROM tbl_whish_list JOIN tblproduct ON tblproduct.id = tbl_whish_list.product_id';
                //$result = $conn->query($query);
                $result=mysqli_query($conn,$query);
                $whish_array = $result->fetch_assoc();
                //$whish_array = $db->select($query);
                if (! empty($whish_array)) {
                foreach ($whish_array as $key => $value) {
            ?>
		<div class="product-item">
                    <form method="post"
                        action="index.php?action=add&code=<?php echo $whish_array[$key]["code"]; ?>">
                        <div class="product-image">
                            <?php $folder = $whish_array[$key]["productID"];?>
                            <img
                                src="<?php echo $folder ?>/1.webp" alt="image1">
                        </div>
                        <div class="product-tile-footer">
                            <div class="product-title"><?php echo $whish_array[$key]["name"]; ?> <span
                                    data-pid="<?php echo $whish_array[$key]["product_id"]; ?>"
                                    class="heart"
                                    onclick="removeFromWishlist(this)"
                                    title="Add to wish list"> <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-line join="round"
                                        stroke="currentColor"
                                        class="feather feather-heart color-filled">
									<path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <img src="images/loading.gif"
                                    id="loader">
                                </span>
                            </div>
                            <div class="product-price"><?php echo "$".$whish_array[$key]["price"]; ?></div>
                            <div class="cart-action">
                                <input type="text"
                                    class="product-quantity"
                                    name="quantity" value="1" size="2" /><input
                                    type="submit" value="Add to Cart"
                                    class="btnAddAction" />
                            </div>
                        </div>
                    </form>
                </div>
	<?php
    }
}
?>
</div>
        </div>
    </div>
    <script type="text/javascript" src="wishlistscript1.js"></script>
    <script type="text/javascript" src="js/wishlist.js"></script>
</BODY>
</HTML>