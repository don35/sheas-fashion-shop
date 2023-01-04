<?php

include("functions/userfunctions.php");
include("userpanel/includes/header.php"); 
include("userpanel/includes/slider.php"); 

?>
<style>
    *{
        font-family: 'Rajdhani';
    }

    .underline{
    height: 5px;
    width: 150px;
    background-color: darkred;
    border-radius: 20px; 
    }

    .bg-f2f2f2{
        background-color: #f2f2f2;
    }

    .footer{
        background-color: black;
        color:white;
        
    .links{
         ul {list-style-type: none;}
    li a{
      color: white;
      transition: color .2s;
      &:hover{
        text-decoration:none;
        color:#4180CB;
        }
    }
}  
  .about-company{
    i{font-size: 25px;}
    a{
      color:white;
      transition: color .2s;
      &:hover{color:#4180CB}
    }
  } 
  .location{
    i{font-size: 18px;}
  }
  .copyright p{border-top:1px solid rgba(255,255,255,.1);} 
}
</style>

<div class="py-5">
    <div class="container">
        <div class = "row">
            <div class="col-md-12">
                <h4>Top Sale Products</h4>
                <div class="underline mb-2"></div>
                <div class="owl-carousel owl-theme">
                        <?php 
                            $topSaleProducts = getAllTopSales();
                            if(mysqli_num_rows($topSaleProducts) > 0)
                            {
                                foreach ($topSaleProducts as $item) 
                                {
                                    ?>
                                        <div class="item">
                                            <a href="productsview.php?product=<?= $item['tag_name']; ?>" class="text-decoration-none"> 
                                                <div class="card shadow" style="width: fit-content;">
                                                    <div class="card-body">
                                                        <img src="products/<?php echo $item['image']; ?>" alt="Product Image" width="300px" height="200px">
                                                        <h4 class="text-center fs-5 text-dark"><?php echo $item['name']; ?></h4> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php   
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class = "row">
            <div class="col-md-12">
                <h4>Stylish clothes, Stylish life.</h4>
                <div class="underline mb-2"></div>
                <br><h3>About Us</h3>
                <p>
                Shea's Fashion Shop is the world’s leading quick-to-market apparel and lifestyle brand on batangas. We are renowned for delivering the season’s most wanted styles to millions of people on the philippines 
                , we sell collections for women, men, curve, and kids. We are a pop culture phenomenon, reaching staggering social media followings of over 25 million, of which includes celebrity fans and collaborators.
                </p>
                <h3>Our Mission</h3>
                <p>
                Our team works around-the-clock to bring you the world’s hottest styles. We forecast fashion trends before anyone else, and introduce 1,000+ new arrivals to our site every week! We listen to our customers and are always finding innovative ways to improve and deliver the most coveted styles at a moment’s notice. It’s our top priority to ensure that our FN community always feels confident and included. We cater to anyone who has an affinity for fashion. Regardless of shape, personal style, or gender, we’re here to fit everyone.
                Today, Shea's Fashion Shop mission remains the same—making affordable fashion accessible to customers around the philippines. 
               
                </p>
            </div>
        </div>
    </div>
</div>

<div class="pt-5 pb-1 footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xs-12 about-company">
                <h2>Shea's Fashion Shop</h2>
                <p class="pr-5 text-white-100">Stylish clothes, Stylish life. </p>
                <p><a href="https://www.facebook.com/sheasfashionshop" target="_blank" title="Go To Our Facebook Page"><i class="fab fa-facebook-f"></i></a></p>
                </div>
                    <div class="col-lg-3 col-xs-12 links">   
                    </div>
                            <div class="col-lg-4 col-xs-12 location">
                            <h4 class="mt-lg-0 mt-sm-4">Location</h4>
                            <p>Lt Col D. Atienza St.Batangas City Philippines</p>
                            <p class="mb-0"><i class="fa fa-phone mr-3"></i>0915 058 4490</p>
                            <p><i class="fa fa-envelope-o mr-3">
                            </i>lea_yeager@yahoo.com</p>
    </div>
</div>
            <div class="row mt-5">
            <div class="col copyright">
            <center><p class=""><small class="text-white-50">2022. All Rights Reserved © Sheas Fashion Shop - <?= date('Y') ?>.</center>

<?php include("userpanel/includes/footer.php"); ?>  
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>