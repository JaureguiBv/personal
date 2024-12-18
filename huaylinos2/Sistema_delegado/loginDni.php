<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("inc/meta.php");
    ?>
    <title>Document</title>
</head>
<body>
    <main>
    <div class="text-center">
         <h1 class="mb-4">Escáner de DNI</h1>
         <div id="scanner" class="border border-primary rounded p-3 mb-3" style="width: 100%; height: 300px;">
            <!-- El escáner de QuaggaJS se mostrará aquí -->
         </div>
         <input type="text" id="dniField" class="form-control w-50 mx-auto" placeholder="DNI escaneado aquí" readonly>
      </div>
      <button class="btn btn-primary mt-3">
            <a href="index.php">Regresar</a>
         </button>
        <?php
            include("inc/scripts.php");
        ?>
    </main>
</body>
</html>