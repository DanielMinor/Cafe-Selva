<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Selva - Dashboard Administrador</title>
    <link rel="stylesheet" href="./styles/admi.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <section class="header">
        <div class="containerMaya">
            <img id="imgMaya" src="./img/maya.png" alt="">
        </div>
    </section>
    <section class="bodyPage">
        <div class="menuAdmi">
            <a href="">
                <div id="btnPrimary" class="btnsMenu">
                    <img src="./img/iconHouse.png" alt="btnHome">
                    <p>Dashboard</p>
                </div>
            </a>
            <a href="">
                <div class="btnsMenu">
                    <img src="./img/iconUser.png" alt="btnClientes">
                    <p>Cliente</p>
                </div>
            </a>
            <a href="">
                <div class="btnsMenu">
                    <img src="./img/iconReport.png" alt="btnReportes">
                    <p>Reportes</p>
                </div>
            </a>
        </div>
    
        <div class="bodySpaceWork">
            <h1>Dashboard Café Selvas</h1>
            <div class="containerFlashReports">
                <div class="cardsFlashNews">
                    <div class="partsCards">
                        <img id="iconCredit" src="./img/iconCreditCard.png" alt="">
                        <p class="pText">Ventas Diarias</p>
                        <p class="pNumeros">4K</p>
                        <div class="newPorcent">
                            <img src="./img/iconUp.png" alt="">
                            <p>34% este dia</p>
                        </div>
                    </div>
                    <div id="iconGrapics" class="partsCards">
                        <img src="./img/iconGrapics.png" alt="">
                    </div>
                </div>
                <div class="cardsFlashNews">
                    <div class="partsCards">
                        <img id="iconCredit" src="./img/iconCreditCard.png" alt="">
                        <p class="pText">Ventas Mensuales</p>
                        <p class="pNumeros">120K</p>
                        <div class="newPorcent">
                            <img src="./img/iconUp.png" alt="">
                            <p>04% este mes</p>
                        </div>
                    </div>
                    <div id="iconGrapics" class="partsCards">
                        <img src="./img/iconGrapics.png" alt="">
                    </div>
                </div>
                <div class="cardsFlashNews">
                    <div class="partsCards">
                        <img id="iconCredit" src="./img/iconCreditCard.png" alt="">
                        <p class="pText">Clientes Totales</p>
                        <p class="pNumeros">520</p>
                        <div class="newPorcent">
                            <img src="./img/iconUp.png" alt="">
                            <p>10% este mes</p>
                        </div>
                    </div>
                    <div id="iconGrapics" class="partsCards">
                        <img src="./img/iconGrapics.png" alt="">
                    </div>
                </div>
            </div>
            <div class="containerGrapics">
                <canvas id="grafica1" class="grafica"></canvas>
            </div>
        </div>

    <script>
        // Datos para la gráfica generados dinámicamente con PHP
        var labels = <?php echo json_encode(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']); ?>;
        var data = <?php echo json_encode([10, 20, 15, 25, 30]); ?>;

        // Configuración de la gráfica
        var ctx = document.getElementById('grafica1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ventas Mensuales',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>