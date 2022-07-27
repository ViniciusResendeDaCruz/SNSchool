<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css') ?> ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
</head>

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #1337d8;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(19, 55, 216, 1), rgba(158, 95, 221, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(19, 55, 216, 1), rgba(158, 95, 221, 1))
    }



    .cards {
        display: grid;
        grid-template-columns: auto auto auto auto;
        /* flex-wrap: wrap; */
        /* justify-content: space-between; */
    }

    .cards1 {
        grid-row: 1/2;
        /* grid-column: 1/2; */
    }

    .cards2 {
        grid-row: 1/2;
        /* grid-column: 2/4; */
    }


    .card-disciplina {
        margin: 20px;
        padding: 20px;
        width: 500px;
        min-height: 200px;
        /* height: auto; */
        display: grid;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;

    }

    .card-content {
        scrollbar-color: #6969dd #e0e0e0;
        scrollbar-width: thin;
        overflow: auto;
        height: 75px;
        grid-row: 4/6;

    }

    .card-professor {
        height: 10px;
        margin-top: -10px;
    }

    .card-content::-webkit-scrollbar {
        width: 5px;
        grid-row: 6/7;
    }

    .card-content::-webkit-scrollbar-track {
        background-color: #6969dd;
        border-radius: 10px;
    }

    .card-content::-webkit-scrollbar-thumb {
        background-color: #fff;
        border-radius: 10px;
    }

    .card-disciplina:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
    }

    .card__link {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        /* grid-row: 5/6; */
    }

    .card_link_text:hover {
        color: #fff;
    }

    .card__exit,
    .card__icon {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        /* grid-row:5/6 ; */
    }

    .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        color: #fff;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
    }

    .card__link:hover::after {
        width: 100%;
        color: #fff;
    }

    .card__exit {
        grid-row: 1/2;
        justify-self: end;
    }

    .card__icon {
        grid-row: 2/3;
        font-size: 30px;
    }

    .card__title {
        grid-row: 2/4;
        font-weight: 400;
        color: #ffffff;
    }

    .card__apply {
        grid-row: 6/7;
        grid-column: 1/2;
        align-self: center;
        margin-bottom: 0;
    }


    /* CARD BACKGROUNDS */

    .card-1 {
        background: radial-gradient(#1fe4f5, #3fbafe);
    }

    .card-2 {
        background: radial-gradient(#fbc1cc, #fa99b2);
    }

    .card-3 {
        background: radial-gradient(rgba(19, 55, 216, 1), rgba(158, 95, 221, 1));
    }

    .card-4 {
        background: radial-gradient(#60efbc, #58d5c9);
    }

    .card-5 {
        background: radial-gradient(#f588d8, #c0a3e5);
    }

    /* RESPONSIVE */

    @media (max-width: 1600px) {
        .cards {
            justify-content: center;
        }
    }

    .center {
        margin: auto;
        width: 100%;
        padding: 10px;
        margin-top: 2rem;
        text-align: center;
        position: relative;
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 gradient-custom">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="<?php echo base_url('dashboard') ?>">
                    <div class="sidebar-brand-icon rotate-n-15"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-building fs-4" style="transform: translate(0px) rotate(15deg) scale(1.58) skew(0deg);transform-origin: center;">
                            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"></path>
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"></path>
                        </svg></div>
                    <div class="sidebar-brand-text mx-3"><span>Sn School</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard') ?>"><i class="far fa-clipboard" style="font-size: 20px;"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('perfil') ?>"><i class="fas fa-user" style="font-size: 20px;"></i><span>Meu Perfil</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('disciplinas') ?>"><i class="fas fa-table" style="font-size: 20px;"></i><span>Disciplinas</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('relatorios') ?>"><i class="bi bi-paperclip" style="font-size: 20px;"></i><span>Relatórios</span></a></li> -->
                    <!-- <li class="nav-item"></li> -->
                    <!-- <li class="nav-item"></li> -->
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $nome ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="<?php echo base_url('Perfil') ?>"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="<?php echo base_url('disciplinas')?>"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Disciplinas</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('dashboard/deslog') ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php $this->renderSection('content') ?>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="<?php //echo base_url('assets/js/theme.js') 
                        ?>"></script> -->
    <script>
        var baseUrl = "<?php echo base_url() ?>"
    </script>
</body>

</html>