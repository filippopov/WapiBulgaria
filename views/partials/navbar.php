<?php
/** @var \FPopov\Core\ViewInterface $this */
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->uri('books', 'allBooks')?>"><img id="logo" src="<?php echo $uriJunk?>content/images/wapiBulgariaLogo.jpg"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $this->uri('books', 'allBooks')?>">See All books<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $this->uri('books', 'addBook')?>">Add book<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-left" action="<?php echo $this->uri('users', 'logOut')?>" method="post">
                        <button type="submit" class="btn btn-default">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>