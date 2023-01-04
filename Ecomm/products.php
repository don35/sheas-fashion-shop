<?php
include("userpanel/includes/header.php"); 
//include("userpanel/includes/slider.php");
include("functions/userfunctions.php");

if(isset($_GET['category']))
{
$category_tagname = $_GET['category'];
$category_data = getNameActive("categories", $category_tagname);
$category = mysqli_fetch_array($category_data);

if($category)
{
$cid = $category['id'];
?>

<div class="py-3 bg-info    ">
    <div class="container">
        <h6 class="text-white"> 
            <a class="text-white" href="index.php" style="text-decoration: none;">
            Home >
            </a>
            <a class="text-white" href="categories.php "style="text-decoration: none;">
            Fashion Collections >
            </a>
            <?= $category['name']; ?></h6>
    </div>
</div>
<style>
    *{
        font-family: 'Rajdhani';
    }
    
</style>
<div class="py-5">
    <div class="container">
        <div class="row">
            <center><div class="col-md-10  mb-2">
            <h1><?= $category['name']; ?></h1>
            <hr>
            </center>

            <?php
            $products = getProdByCategory($cid);
            
            if(mysqli_num_rows($products) > 0)
            {
                foreach($products as $item)
                {
                    ?>
                    <div class="col-md-3 mb-3">
                        <a class="text-decoration-none" href="productsview.php?product=<?= $item['tag_name']; ?>"> 
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="products\<?php echo $item['image']; ?>" alt="Product Image" class="w-100" width="700px" height="200px">
                                    <h4 class="text-center text-dark"><?php echo $item['name']; ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
            }
            else
            {
                echo "No Products Available";
            }
                ?>
        </div>
    </div>
</div>
        
<?php 
}
else
{
    echo "Something Went Wrong";
}
}
else
{
    echo "Something Went Wrong";
}

include("userpanel/includes/footer.php"); ?>