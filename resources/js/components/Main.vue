<template>
    <main class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white my_bg-dark my_font-paragraph" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">{{ user.name }}</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        My Account
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Payments
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="w-100">
            <!-- Barra di ricerca -->
            <div class="d-flex bg-warning p-3 justify-content-around align-items-center">
                <ul class="d-flex m-0 list-unstyled w-50 justify-content-around my_font-paragraph">
                    <li><a class="text-decoration-none text-dark" href="#offerte-speciali">Offerte Speciali</a></li>
                    <li><a class="text-decoration-none text-dark" href="#i-piu-richiesti">I Più Richiesti</a></li>
                    <li><a class="text-decoration-none text-dark" href="#le-nostre-proposte">Le Nostre Proposte</a></li>
                    <li><a class="text-decoration-none text-dark" href="#">Polpette</a></li>
                </ul>
            </div>

            <!-- Jumbotron -->
            <div class="w-100 p-5 my_bg-dark my_jumbotron">
                <div class="p-5 w-50">
                    <h1 class="text-warning my_font-title" style="font-size: 4em;">Solo i
                        ristoranti migliori</h1>
                    <p class="text-white my_font-paragraph">Lorem Ipsum Lorem ipsum Lorem ipsum dolor sit amet
                        consectetur adipisicing
                        elit. Corrupti, ipsa
                        maxime illo quo, accusantium nesciunt ducimus deserunt doloribus quod ex omnis quidem
                        consequatur atque libero aut fugit? Illum, quaerat quas!</p>
                </div>
            </div>

            <!-- Sezione Offerte Speciali -->
            <div class="w-100 text-center bg-warning p-5" id="offerte-speciali">
                <h2 class="my_font-title" style="font-size: 3.3em;">Offerte Speciali
                </h2>
                <h5 class="my_font-paragraph">Scopri le offerte più convenienti!</h5>
            </div>
            <div class="w-100 text-center p-4">
                <h4>Slider con offerte speciali???</h4>
            </div>

            <!-- Sezione I Più Richiesti -->
            <div class="w-100 d-flex flex-row-reverse p-5 my_bg-dark my_most-requests" id="i-piu-richiesti">
                <div class="p-5 w-50">
                    <h2 class="text-warning my_font-title" style="font-size: 4em;">I pi&ugrave;
                        richiesti</h2>
                    <p class="text-white my_font-paragraph">Lorem Ipsum Lorem ipsum Lorem ipsum dolor sit amet
                        consectetur adipisicing
                        elit. Corrupti, ipsa
                        maxime illo quo, accusantium nesciunt ducimus deserunt doloribus quod ex omnis quidem
                        consequatur atque libero aut fugit? Illum, quaerat quas!</p>
                </div>
            </div>

            <!-- Sezione Le Nostre Proposte -->
            <div class="w-100 text-center bg-warning p-5" id="le-nostre-proposte">
                <h2 class="my_font-title" style="font-size: 3.3em;">Le Nostre Proposte
                </h2>
                <h5 class="my_font-paragraph">Non sai cosa mangiare? Ecco le nostre proposte!</h5>
            </div>
            <div class="w-100 text-center p-4">
                <h4>Slider con proposte casuali prese dal DB???</h4>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: 'Main'
}
</script>

<style lang="scss" scoped>

</style>