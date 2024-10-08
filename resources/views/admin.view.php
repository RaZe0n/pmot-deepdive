<?php

$hideNav = true;
if (!isAdmin()) {
    header("Location: /");
}

require_once "./controllers/adminController.php";

$adminController = new adminController();
$products = $adminController->getProducts();
$orders = $adminController->getOrders();
$gebruikers = $adminController->getGebruikers();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $adminController->deleteProduct();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Agregar estilos para la vista de dispositivos pequeños */
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }

            .section-small {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Barra de navegación superior -->
        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
            <div class="flex lg:flex-1">
            <a href="?page=home" class="-m-1.5 p-1.5">
                <h1 class=" text-white bg-red-500 rounded p-1 px-2 font-bold">PMOT</h1>
            </a>
        </div>
                <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                    <button id="menuBtn">
                        <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                    </button>
                </div>
            </div>

            <!-- Ícono de Notificación y Perfil -->
            <div class="space-x-5">
                <button>
                    <i class="fas fa-bell text-gray-500 text-lg"></i>
                </button>
                <!-- Botón de Perfil -->
                <button>
                    <i class="fas fa-user text-gray-500 text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 flex bg-gray-100">
            <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
            <div class="p-2 bg-white w-60 flex flex-col hidden md:flex" id="sideNav">
                <nav>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-400 hover:to-red-300 hover:text-white" href="#">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-400 hover:to-red-300 hover:text-white" href="#">
                        <i class="fas fa-users mr-2"></i>Gebruikers
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-400 hover:to-red-300 hover:text-white" href="#">
                        <i class="fas fa-store mr-2"></i>Orders
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-400 hover:to-red-300 hover:text-white" href="#">
                        <i class="fas fa-file-alt mr-2"></i>Producten
                    </a>
                </nav>

                <!-- Señalador de ubicación -->
                <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mt-2"></div>


            </div>


            <!-- Área de contenido principal -->
            <div class="flex-1 p-4">
                <!-- Contenedor de las 4 secciones (disminuido para dispositivos pequeños) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
                    <!-- Gebruikers overview -->
                    <div class="bg-white p-4 rounded-lg shadow-md tab-content">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Gebruikersoverzicht</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Firstname</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Lastname</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">email</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gebruikers as $gebruiker) : ?>
                                    <tr class="hover:bg-grey-lighter text-center">
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $gebruiker['firstname'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $gebruiker['lastname'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $gebruiker['email'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $gebruiker['country'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Orders overview -->
                    <div class="bg-white p-4 rounded-lg shadow-md tab-content">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Bestellingen overzicht</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Naam</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Status</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Datum van bestelling</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Totale prijs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <tr class="hover:bg-grey-lighter text-center">
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $order['orderOwner'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $order['status'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $order['orderDate'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $order['totalPrice'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="grid gap-4 mt-2 p-2">
                    <div class="flex justify-end">
                        <a href="/?page=addproduct" class="w-10 h-10 flex items-center justify-center bg-white rounded-full">
                            <i class="fas fa-plus text-green-500 text-2xl"></i>
                        </a>
                    </div>
                    <!-- Productsoverview -->
                    <div class="bg-white p-4 rounded-lg shadow-md tab-content">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Producten overzicht</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Naam</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Beschrijving</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Prijs</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Voorrraad</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Foto</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Bewerken</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Verwijderen</th>
                                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Bekijken</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($products as $product) : ?>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $product['name'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= mb_strimwidth($product['description'], 0, 200, '...') ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light">€<?= $product['price'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><?= $product['stock'] ?></td>
                                        <td class="py-2 px-4 border-b border-grey-light"><img src="<?= $product['image'] ?>" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                                        <td class="py-2 px-4 border-b border-grey-light">
                                            <form class="product-edit-form" action="" method="GET">
                                                <input type="hidden" name="page" value="adminProductEdit">
                                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                                <button>
                                                    <i class="fas fa-edit text-blue-500 text-2xl"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-2 px-4 border-b border-grey-light">
                                            <form class="product-delete-form" action="#" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                                <button>
                                                    <i class="fas fa-trash text-red-500 text-2xl"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-2 px-4 border-b border-grey-light">
                                            <form class="product-edit-form" action="" method="GET">
                                                <input type="hidden" name="page" value="adminProductDetails">
                                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                                <button>
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Script para las gráficas -->
    <script>
        const tabsContent = document.querySelectorAll('.tab-content');
        const sideNavButtons = document.querySelectorAll('#sideNav nav a');

        sideNavButtons.forEach((button, index) => {

            button.addEventListener('click', () => {
                if (index === 0) {
                    tabsContent.forEach(tab => tab.classList.remove('hidden'));
                    return;
                }
                tabsContent.forEach((tab, tabIndex) => {
                    if (tabIndex === index - 1) {
                        console.log(tabIndex, index);
                        tab.classList.remove('hidden');
                    } else {
                        tab.classList.add('hidden');
                    }
                });
            });
        });

        const deleteBtnsForms = document.querySelectorAll('.product-delete-form');
        deleteBtnsForms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                if (confirm('Weet je zeker dat je dit product wilt verwijderen?')) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>