<?php
/** @var \FPopov\Core\ViewInterface $this */
?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo $this->uri('books', 'allBooks')?>"><img id="logo" src="<?php echo $uriJunk?>content/images/wapiBulgariaLogo.jpg"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->uri('books', 'allBooks')?>">See All books<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->uri('books', 'addBook')?>">Add book<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo $this->uri('users', 'logOut')?>" method="post">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Log Out</button>
        </form>
    </div>
</nav>