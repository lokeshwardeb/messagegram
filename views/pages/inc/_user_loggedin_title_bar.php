<div class="container fs-5 login-title-bar mb-4 bg-light text-primary p-2">
            <div class="row">
                <div class="col-8">
                    <img src="<?php echo 'assets/img/users_img/img/' . $_SESSION['user_img'] ?>" width="50px" height="50px" alt="" srcset="" class="rounded-circle"> <?php echo $_SESSION['username'] ?>
                </div>
                <div class="col-4">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </div>