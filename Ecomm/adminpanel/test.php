<?php 
                            $categories = getAll("categories");

                            if(mysqli_num_rows($categories > 0))
                            {
                                foreach ($categories as $item) {
                                    ?>
                                        <option value="<?= $item['id']; ?><?= $item['name']; ?>">One</option>
                                    <?php
                            }
                        }
                        else
                        {
                            echo "No Category Available";
                        }
                            
                            ?>